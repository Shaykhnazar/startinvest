<?php

namespace App\Orchid\Resources;

use App\Models\Country;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class CountryResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Country::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title('Name')
                ->placeholder('Uzbekistan')
                ->required(),

            Input::make('iso3')
                ->title('ISO3 Code')
                ->placeholder('UZB'),

            Input::make('iso2')
                ->title('ISO2 Code')
                ->placeholder('UZ'),

            Input::make('phonecode')
                ->title('Phone Code')
                ->placeholder('+998'),

            Input::make('capital')
                ->title('Capital')
                ->placeholder('Tashkent'),

            Input::make('currency')
                ->title('Currency')
                ->placeholder('UZS'),

            Input::make('currency_symbol')
                ->title('Currency Symbol')
                ->placeholder('soʻm'),

            DateTimer::make('created_at')
                ->title('Date of Creation')
                ->format('Y-m-d H:i:s'),

            DateTimer::make('updated_at')
                ->title('Date of Update')
                ->format('Y-m-d H:i:s'),
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

            TD::make('name', 'Name')
                ->filter(TD::FILTER_TEXT),

            TD::make('iso3', 'ISO3')
                ->filter(TD::FILTER_TEXT),

            TD::make('iso2', 'ISO2')
                ->filter(TD::FILTER_TEXT),

            TD::make('phonecode', 'Phone Code'),

            TD::make('capital', 'Capital')
                ->filter(TD::FILTER_TEXT),

            TD::make('currency', 'Currency')
                ->filter(TD::FILTER_TEXT),

            TD::make('currency_symbol', 'Currency Symbol'),

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
            Sight::make('name', 'Name'),
            Sight::make('iso3', 'ISO3 Code'),
            Sight::make('iso2', 'ISO2 Code'),
            Sight::make('phonecode', 'Phone Code'),
            Sight::make('capital', 'Capital'),
            Sight::make('currency', 'Currency'),
            Sight::make('currency_symbol', 'Currency Symbol'),
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
}
