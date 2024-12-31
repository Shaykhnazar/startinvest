<?php

namespace App\Orchid\Screens\Blog;

use App\Models\BlogCategory;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryEditScreen extends Screen
{
    public $category;

    public function query(BlogCategory $category): array
    {
        return [
            'category' => $category
        ];
    }

    public function name(): ?string
    {
        return $this->category->exists ? 'Edit Category' : 'Create Category';
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create category')
                ->icon('plus')
                ->method('createOrUpdate')
                ->canSee(!$this->category->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->category->exists),

            Button::make('Delete')
                ->icon('trash')
                ->method('delete')
                ->canSee($this->category->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('category.name')
                    ->title('Name')
                    ->required()
                    ->placeholder('Category name'),

                TextArea::make('category.description')
                    ->title('Description')
                    ->rows(3)
                    ->placeholder('Category description'),

                Select::make('category.parent_id')
                    ->title('Parent Category')
                    ->fromModel(BlogCategory::class, 'name')
                    ->empty('No parent'),

                Input::make('category.order')
                    ->title('Order')
                    ->type('number')
                    ->value(0),

                CheckBox::make('category.is_active')
                    ->title('Active')
                    ->value(1)
                    ->placeholder('Is category active?'),
            ])
        ];
    }

    public function createOrUpdate(Request $request, BlogCategory $category)
    {
        $validated = $request->validate([
            'category.name' => 'required|string|max:255',
            'category.description' => 'nullable|string',
            'category.parent_id' => 'nullable|exists:blog_categories,id',
            'category.order' => 'nullable|integer',
            'category.is_active' => 'boolean'
        ]);

        $category->fill($validated['category']);

        if (!$category->slug) {
            $category->slug = Str::slug($category->name);
        }

        $category->save();

        return redirect()->route('platform.blog.categories');
    }

    public function delete(BlogCategory $category)
    {
        $category->delete();

        return redirect()->route('platform.blog.categories');
    }
}
