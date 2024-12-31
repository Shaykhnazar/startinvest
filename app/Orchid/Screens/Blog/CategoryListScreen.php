<?php

namespace App\Orchid\Screens\Blog;

use App\Models\BlogCategory;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;

class CategoryListScreen extends Screen
{
    public function query(): array
    {
        return [
            'categories' => BlogCategory::defaultSort('id', 'desc')
                ->paginate()
        ];
    }

    public function name(): ?string
    {
        return 'Blog Categories';
    }

    public function description(): ?string
    {
        return 'Manage all blog categories';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Create new')
                ->icon('plus')
                ->route('platform.blog.categories.edit')
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('categories', [
                TD::make('id')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->width('150px'),

                TD::make('name', 'Name')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(function (BlogCategory $category) {
                        return Link::make($category->name)
                            ->route('platform.blog.categories.edit', $category);
                    }),

                TD::make('slug')
                    ->sort()
                    ->filter(TD::FILTER_TEXT),

                TD::make('parent_id', 'Parent')
                    ->render(function (BlogCategory $category) {
                        return $category->parent ? $category->parent->name : '-';
                    }),

                TD::make('order')
                    ->sort()
                    ->alignCenter(),

                TD::make('is_active', 'Active')
                    ->render(function (BlogCategory $category) {
                        return $category->is_active ? 'Yes' : 'No';
                    })
                    ->alignCenter(),

                TD::make('created_at', 'Created')
                    ->sort()
                    ->render(function (BlogCategory $category) {
                        return $category->created_at->format('d.m.Y');
                    }),
            ])
        ];
    }
}
