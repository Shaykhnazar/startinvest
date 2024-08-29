<?php

namespace App\Services;

use App\Models\Industry;
use App\Models\StartupStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CacheService
{

    /**
     * Выгрузить из кэша все стартап-индустрии.
     */
    public static function industryAll(): Collection
    {
        return self::loadAll(new Industry());
    }

    /**
     * Выгрузить из кэша все стартап-статусы.
     */
    public static function startupStatusAll(): Collection
    {
        return self::loadAll(new StartupStatus());
    }

    /**
     * Выгрузить из кэша полную коллекцию указанной модели.
     */
    protected static function loadAll(Model $model, ?Builder $query = null): Collection
    {
        if (!class_exists($model::class)) {
            return collect();
        }

        $className = (new \ReflectionClass($model::class))->getShortName();

        return \Cache::remember(\Str::snake($className), now()->addDays(7), function () use ($model, $query) {
            return $query ? $query->get() : $model::all();
        });
    }
}
