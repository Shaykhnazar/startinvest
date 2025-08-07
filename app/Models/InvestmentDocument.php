<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class InvestmentDocument extends Model
{
    use AsSource, Attachable, SoftDeletes;

    protected $fillable = [
        'investment_id',
        'title',
        'description',
        'document_type',
        'file_path',
        'file_name',
        'file_size',
        'uploaded_by',
        'is_confidential',
        'signed_at',
        'expires_at'
    ];

    protected $casts = [
        'signed_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_confidential' => 'boolean',
        'file_size' => 'integer'
    ];

    // Relationships
    public function investment(): BelongsTo
    {
        return $this->belongsTo(Investment::class);
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    // Scopes
    public function scopeByType($query, $type)
    {
        return $query->where('document_type', $type);
    }

    public function scopeConfidential($query)
    {
        return $query->where('is_confidential', true);
    }

    public function scopePublic($query)
    {
        return $query->where('is_confidential', false);
    }

    public function scopeSigned($query)
    {
        return $query->whereNotNull('signed_at');
    }

    // Methods
    public function getDocumentTypeLabel(): string
    {
        return match($this->document_type) {
            'contract' => 'Investment Contract',
            'term_sheet' => 'Term Sheet',
            'due_diligence' => 'Due Diligence Document',
            'financial' => 'Financial Document',
            'legal' => 'Legal Document',
            'other' => 'Other Document',
            default => 'Unknown Document Type'
        };
    }

    public function isSigned(): bool
    {
        return !is_null($this->signed_at);
    }

    public function isExpired(): bool
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    public function getFileSizeFormatted(): string
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }
}