<?php

namespace App\Http\Resources;

use App\Actions\DateFormatForHumans;
use App\Enums\StartupStatusEnum;
use App\Enums\StartupTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Startup */
class StartupResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'additional_information' => $this->additional_information,
            'start_date' => $this->start_date,
            'has_mvp' => $this->has_mvp,
            'owner' => UserResource::make($this->owner),
            'created_at' => DateFormatForHumans::run($this->created_at),
            'updated_at' => DateFormatForHumans::run($this->updated_at),
            'trashed' => $this->trashed(),
            'industries' => IndustryResource::collection($this->industries),
            $this->mergeWhen($request->routeIs('dashboard.startups.add', 'dashboard.startups.edit'), [
                'type' => StartupTypeEnum::from($this->type),
                'status' => StartupStatusEnum::from($this->status),
            ], default: [
                'type' => StartupTypeEnum::from($this->type)->label(),
                'status' => StartupStatusEnum::from($this->status)->label(),
            ]),
            $this->mergeWhen($request->with_content, [
                'description' => $this->description,
            ]),
        ];
    }
}
