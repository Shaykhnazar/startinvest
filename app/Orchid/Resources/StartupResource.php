<?php

namespace App\Orchid\Resources;

use App\Models\Startup;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Relation;

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
     * @throws BindingResolutionException
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->required()
                ->title('Project Title'),

            TextArea::make('description')
                ->required()
                ->title('Project Description'),

            TextArea::make('additional_information')
                ->title('Additional Information')
                ->rows(5),

            DateTimer::make('start_date')
                ->title('Start Date'),

            DateTimer::make('end_date')
                ->title('End Date'),

            Input::make('success_rate')
                ->title('Success Rate')
                ->type('number'),

//            Relation::make('owner_id')
//                ->title('Project Owner')
//                ->fromModel(User::class, 'name'),
//
//            Relation::make('client_id')
//                ->title('Client')
//                ->fromModel(User::class, 'name'),

            Input::make('base_price')
                ->title('Base Price')
                ->type('number'),

            RadioButtons::make('has_mvp')
                ->title('MVP Indicator')
                ->options([
                    1 => 'Yes',
                    0 => 'No',
                ]),

            Select::make('status')
                ->title('Status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                    'done' => 'Done',
                ]),

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
            TD::make('id'),

            TD::make('title'),

            TD::make('description'),

            TD::make('start_date'),

            TD::make('end_date'),

            TD::make('success_rate'),

            TD::make('owner_id'),

            TD::make('client_id'),

            TD::make('base_price'),

            TD::make('has_mvp'),

            TD::make('status'),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
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
            Sight::make('description', 'Project Description'),
            Sight::make('additional_information', 'Additional Information'),
            Sight::make('start_date', 'Start Date'),
            Sight::make('end_date', 'End Date'),
            Sight::make('success_rate', 'Success Rate'),
            Sight::make('owner_id', 'Project Owner'),
            Sight::make('client_id', 'Client'),
            Sight::make('base_price', 'Base Price'),
            Sight::make('has_mvp', 'MVP Indicator')->render(function ($model) {
                return $model->has_mvp ? 'Yes' : 'No';
            }),
            Sight::make('status', 'Status'),
        ];
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

    public function rules(Model $model): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'additional_information' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'success_rate' => 'nullable',
            'owner_id' => 'required',
            'client_id' => 'nullable',
            'base_price' => 'nullable',
            'has_mvp' => 'required',
            'status' => 'required',
        ];
    }
}
