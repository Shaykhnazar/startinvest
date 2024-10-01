<?php

namespace App\Orchid\Resources;

use App\Enums\StartupStatusEnum;
use App\Enums\StartupTypeEnum;
use App\Models\Industry;
use App\Models\Startup;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class StartupResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Startup::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->required()
                ->title('Project Title')
                ->placeholder('Enter project title'),

            SimpleMDE::make('description')
                ->title('Project Description')
                ->required()
                ->placeholder('Enter project description'),

            TextArea::make('additional_information')
                ->title('Additional Information')
                ->rows(5)
                ->placeholder('Enter additional information'),

            DateTimer::make('start_date')
                ->title('Start Date')
                ->required(),

            Relation::make('owner_id')
                ->title('Project Owner')
                ->fromModel(User::class, 'name')
                ->required(),

            RadioButtons::make('type')
                ->title('Type')
                ->options(array_combine(
                    array_map(fn($type) => $type->value, StartupTypeEnum::cases()),
                    array_map(fn($type) => $type->label(), StartupTypeEnum::cases())
                ))
                ->required(),

            RadioButtons::make('has_mvp')
                ->title('MVP Indicator')
                ->options([
                    1 => 'Yes',
                    0 => 'No',
                ])
                ->required(),

            Select::make('status_id')
                ->title('Status')
                ->fromModel(\App\Models\StartupStatus::class, 'label') // Fetch from the StartupStatus model
                ->required(),

            // Industries (many-to-many relationship)
            Relation::make('industries')
                ->fromModel(Industry::class, 'title')
                ->multiple() // Allow selection of multiple industries
                ->title('Industries')
                ->required(),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', 'ID'),

            TD::make('title', 'Title')
                ->filter(TD::FILTER_TEXT),

//            TD::make('description', 'Description')
//                ->render(function ($model) {
//                    return (strip_tags($model->description) === $model->description ? $model->description : strip_tags($model->description) === '') ? 'No description available' : $model->description; // Render HTML safely
//                }), // Optionally limit the description

            TD::make('start_date', 'Start Date')
                ->render(function ($model) {
                    return $model->start_date->toDateString();
                }),

            TD::make('owner_id', 'Project Owner')
                ->render(function ($model) {
                    return $model->owner ? $model->owner->name : 'N/A';
                }),

            TD::make('type', 'Type')
                ->render(function ($model) {
                    return $model->type ?? 'No Type';
                }),

            TD::make('has_mvp', 'MVP Indicator')
                ->render(function ($model) {
                    return $model->has_mvp ? 'Yes' : 'No';
                }),

            TD::make('status_id', 'Status')
                ->render(function ($model) {
                    return $model->status ? $model->status->label : 'No status';
                }),

            TD::make('industries', 'Industries')
                ->render(function ($model) {
                    return $model->industries->pluck('title')->implode(', ');
                }),
            TD::make('created_at', 'Date of Creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update Date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('title', 'Project'),
            Sight::make('description', 'Project Description')
                ->render(function ($model) {
                    return (strip_tags($model->description) === $model->description ? $model->description : strip_tags($model->description) === '') ? 'No description available' : $model->description; // Otherwise, allow rendering HTML
                }),
            Sight::make('additional_information', 'Additional Information'),
            Sight::make('start_date', 'Start Date'),
            Sight::make('owner_id', 'Project Owner')
                ->render(function ($model) {
                    return $model->owner ? $model->owner->name : 'N/A';
                }),
            Sight::make('type', 'Type'),
            Sight::make('has_mvp', 'MVP Indicator')->render(function ($model) {
                return $model->has_mvp ? 'Yes' : 'No';
            }),
            Sight::make('status', 'Status')->render(function ($model) {
                return $model->status->label ?? 'No status';
            }),
            Sight::make('industries', 'Industries')
                ->render(function ($model) {
                    return $model->industries->pluck('title')->implode(', ');
                }),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Model $model
     * @return array
     */
    public function rules(Model $model): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'additional_information' => 'nullable|string',
            'start_date' => 'required|date',
            'owner_id' => 'required|exists:users,id',
            'has_mvp' => 'required|boolean',
            'status_id' => ['required', 'numeric', 'exists:startup_statuses,id'], // Validate status_id
            'type' => ['required', 'string', Rule::enum(StartupTypeEnum::class)],
            'industries' => 'required|array',
            'industries.*' => 'exists:industries,id',
        ];
    }

    public function save(ResourceRequest $request, Model $model): void
    {
        if (method_exists(static::class, 'onSave')) {
            static::onSave($request, $model);

            return;
        }

        $model->forceFill(Arr::except($request->all(), ['industries']))->save();

        // Sync the industries
        if (isset($request['industries'])) {
            $model->industries()->sync($request['industries']);
        }
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
