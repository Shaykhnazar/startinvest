<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('investment_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id')->constrained('investments')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('document_type')->index(); // contract, term_sheet, due_diligence, financial, legal, other
            $table->string('file_path');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->bigInteger('file_size')->nullable(); // File size in bytes
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->boolean('is_confidential')->default(true)->index();
            $table->timestamp('signed_at')->nullable(); // When document was signed
            $table->timestamp('expires_at')->nullable(); // Document expiration date
            $table->string('version')->default('1.0'); // Document version
            $table->json('metadata')->nullable(); // Additional document metadata
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index(['investment_id', 'document_type']);
            $table->index(['document_type', 'is_confidential']);
            $table->index(['uploaded_by', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investment_documents');
    }
};