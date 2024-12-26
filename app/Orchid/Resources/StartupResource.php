<?php

namespace App\Orchid\Resources;

use App\Enums\StartupTypeEnum;
use App\Jobs\PublishStartupToSocialMediaJob;
use App\Models\Industry;
use App\Models\Startup;
use App\Models\User;
use App\Orchid\Actions\PublishToSocialMediaAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Orchid\Crud\Action;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use League\HTMLToMarkdown\HtmlConverter;
use Orchid\Support\Facades\Toast;


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
            Input::make('title.en')
                ->title(__('Project Title (English)'))
                ->placeholder(__('Enter project title in English'))
                ->required(),

            Input::make('title.ru')
                ->title(__('Project Title (Russian)'))
                ->placeholder(__('Enter project title in Russian')),

            Input::make('title.uz_Latn')
                ->title(__('Project Title (Uzbek - Latin)'))
                ->placeholder(__('Enter project title in Uzbek (Latin)')),

            SimpleMDE::make('description.en')
                ->title(__('Project Description (English)'))
                ->placeholder(__('Enter project description in English')),

            SimpleMDE::make('description.ru')
                ->title(__('Project Description (Russian)'))
                ->placeholder(__('Enter project description in Russian')),

            SimpleMDE::make('description.uz_Latn')
                ->title(__('Project Description (Uzbek - Latin)'))
                ->placeholder(__('Enter project description in Uzbek (Latin)')),

            TextArea::make('additional_information.en')
                ->title(__('Additional Information (English)'))
                ->rows(5)
                ->placeholder(__('Enter additional information in English')),

            TextArea::make('additional_information.ru')
                ->title(__('Additional Information (Russian)'))
                ->rows(5)
                ->placeholder(__('Enter additional information in Russian')),

            TextArea::make('additional_information.uz_Latn')
                ->title(__('Additional Information (Uzbek - Latin)'))
                ->rows(5)
                ->placeholder(__('Enter additional information in Uzbek (Latin)')),

            SimpleMDE::make('description')
                ->title('Project Description')
                ->value(function ($value, $model) {
                    $converter = new HtmlConverter();
                    if ($value) {
                        return $converter->convert($value);
                    }
                    return '';
                })
                ->placeholder('Enter project description'),

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

            Switcher::make('has_mvp')
                ->sendTrueOrFalse()
                ->title('Has MVP')
                ->value(function ($value, $model) {
                    if ($value) {
                        return 1;
                    }
                    return 0;
                })
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

            // In the fields() method
            Switcher::make('verified')
                ->sendTrueOrFalse()
                ->title('Verified')
                ->value(function ($value, $model) {
                    if ($value) {
                        return 1;
                    }
                    return 0;
                })
                ->help('Check to verify this startup and publish it to social media.')
                ->canSee(!$this->isVerified())
                ->disabled($this->isVerified()), // Only show if it's not verified
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

            TD::make('title', __('Title'))
                ->render(function (Startup $model) {
                    return $model->getTranslation('title', app()->getLocale());
                }),


            TD::make('verified', 'Verified')
                ->render(function ($model) {
                    return $model->verified ? 'Yes' : 'No';
                }),

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

            TD::make('has_mvp', 'Has MVP')
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
            Sight::make('title', 'Project')->render(function ($model) {
                return $model->title ?? 'No title available';
            }),
            Sight::make('description', 'Project Description')->render(function ($model) {
                return strip_tags($model->description) == $model->description ? $model->description : 'No description available'; // Otherwise, allow rendering HTML
            }),
            Sight::make('additional_information', 'Additional Information')->render(function ($model) {
                return $model->additional_information ?? 'No additional information available';
            }),
            Sight::make('start_date', 'Start Date'),
            Sight::make('owner_id', 'Project Owner')->render(function ($model) {
                return $model->owner ? $model->owner->name : 'N/A';
            }),
            Sight::make('type', 'Type'),
            Sight::make('has_mvp', 'Has MVP')->render(function ($model) {
                return $model->has_mvp ? 'Yes' : 'No';
            }),
            Sight::make('status', 'Status')->render(function ($model) {
                return $model->status->label ?? 'No status';
            }),
            Sight::make('industries', 'Industries')->render(function ($model) {
                return $model->industries->pluck('title')->implode(', ');
            }),
            Sight::make('verified', 'Verified')->render(function ($model) {
                return $model->verified ? 'Yes' : 'No';
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
            'title.en' => 'required|string|max:255',
            'title.ru' => 'nullable|string|max:255',
            'title.uz_Latn' => 'nullable|string|max:255',
            'description.en' => 'required|string',
            'description.ru' => 'nullable|string',
            'description.uz_Latn' => 'nullable|string',
            'additional_information.en' => 'nullable|string',
            'additional_information.ru' => 'nullable|string',
            'additional_information.uz_Latn' => 'nullable|string',
            'start_date' => 'required|date',
            'owner_id' => 'required|exists:users,id',
            'has_mvp' => 'required|boolean',
            'status_id' => ['required', 'numeric', 'exists:startup_statuses,id'], // Validate status_id
            'type' => ['required', 'string', Rule::enum(StartupTypeEnum::class)],
            'industries' => 'required|array',
            'industries.*' => 'exists:industries,id',
            'verified' => [
                'boolean',
                Rule::prohibitedIf($model->verified),
            ],
        ];
    }

    public function save(ResourceRequest $request, Model $model): void
    {
        if (method_exists(static::class, 'onSave')) {
            static::onSave($request, $model);

            return;
        }

        // Exclude 'industries' from the data to fill the model
        $data = Arr::except($request->all(), ['industries']);

        // Convert Markdown back to HTML
        if (isset($data['description'])) {
            $parsedown = new \Parsedown();
            $data['description'] = $parsedown->parse($data['description']);
        }

        // Save the model with the modified data
        $model->forceFill($data)->save();

        // Sync the industries relationship
        if ($request->has('industries')) {
            $model->industries()->sync($request->get('industries'));
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

    protected function isVerified(): bool
    {
        return $this->model->verified ?? false;
    }

    /**
     * Actions for the resource.
     *
     * @return array
     */
    public function actions(): array
    {
        return [
            PublishToSocialMediaAction::class
        ];
    }

}
