<?php

namespace App\Orchid\Resources;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Relation;
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
                ->placeholder('Some idea')
                ->required(),

            SimpleMDE::make('description')
                ->title('Description')
                ->placeholder('Description of idea')
                ->required(),

            // Use Relation to select an author (if necessary)
            Relation::make('author_id')
                ->fromModel(User::class, 'name')
                ->title('Author')
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

            TD::make('author.name', 'Author')
                ->render(function ($idea) {
                    return $idea->author ? $idea->author->name : 'N/A';
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
            Sight::make('id', 'ID'),
            Sight::make('title', 'Title'),
            Sight::make('description', 'Project Description')
                ->render(function ($model) {
                    return (strip_tags($model->description) === $model->description ? $model->description : strip_tags($model->description) === '') ? 'No description available' : $model->description; // Otherwise, allow rendering HTML
                }),
            Sight::make('author.name', 'Author'),
            Sight::make('created_at', 'Created At'),
            Sight::make('updated_at', 'Updated At'),
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
            'description' => 'required|string|min:10',
            'author_id' => 'required|exists:users,id',
        ];
    }
}
