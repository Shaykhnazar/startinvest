<?php

namespace App\Orchid\Resources;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class IdeaResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Idea::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('Title')
                ->placeholder('Some idea'),

            TextArea::make('description')
                ->title('Description')
                ->rows(5)
                ->placeholder('Description of idea'),

            Input::make('author_id')
                ->value(\Auth::id())
                ->hidden(),

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

            TD::make('title', 'Название'),

            TD::make('description', 'Описание'),

            TD::make('author_id', 'Автор'),

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
            Sight::make('id'),
            Sight::make('title'),
            Sight::make('description'),
            Sight::make('author_id'),
            Sight::make('created_at'),
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
            'description' => 'required|string|min:10',
            'author_id' => [
                'required',
                'exists:users,id',
            ],
        ];
    }
}
