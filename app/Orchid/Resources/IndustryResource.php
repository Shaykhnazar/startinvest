<?php

namespace App\Orchid\Resources;

use App\Models\Industry;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Textarea;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class IndustryResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Industry::class;

    /**
     * Get the displayed name of the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        return 'Industries';
    }

    /**
     * Get the singular displayed name of the resource.
     *
     * @return string
     */
    public static function singularLabel(): string
    {
        return 'Industry';
    }

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
                ->placeholder('e.g., Software')
                ->required()
                ->maxlength(255),

            Textarea::make('description')
                ->title('Description')
                ->placeholder('Enter a brief description')
                ->rows(5)
                ->required(),

            Switcher::make('featured')
                ->sendTrueOrFalse()
                ->title('Featured')
                ->help('Mark as featured to highlight this industry.'),

            DateTimer::make('created_at')
                ->title('Date of Creation')
                ->format('Y-m-d H:i:s')
                ->readonly(),

            DateTimer::make('updated_at')
                ->title('Date of Update')
                ->format('Y-m-d H:i:s')
                ->readonly(),
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

            TD::make('featured', 'Featured')
                ->render(function ($model) {
                    return $model->featured
                        ? '<i class="text-success">Yes</i>'
                        : '<i class="text-muted">No</i>';
                })
                ->filter(TD::FILTER_SELECT, [
                    true => 'Yes',
                    false => 'No',
                ]),

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
            Sight::make('description', 'Description'),
            Sight::make('featured', 'Featured')
                ->render(function ($model) {
                    return $model->featured ? 'Yes' : 'No';
                }),
            Sight::make('created_at', 'Date of Creation'),
            Sight::make('updated_at', 'Date of Update'),
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
     * Get the default sort field and direction.
     *
     * @return array
     */
    public function defaultSort(): array
    {
        return ['id', 'asc'];
    }
//
//    /**
//     * Define the resource's permission.
//     *
//     * @return string|null
//     */
//    public static function permission(): ?string
//    {
//        return 'platform.systems.industries';
//    }
}
