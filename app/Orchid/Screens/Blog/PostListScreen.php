<?php

namespace App\Orchid\Screens\Blog;

use App\Models\BlogPost;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Layout;

class PostListScreen extends Screen
{
    public function query(): array
    {
        return [
            'posts' => BlogPost::with('category')
                ->defaultSort('created_at', 'desc')
                ->paginate()
        ];
    }

    public function name(): ?string
    {
        return 'Blog Posts';
    }

    public function description(): ?string
    {
        return 'Manage all blog posts';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Create new')
                ->icon('plus')
                ->route('platform.blog.posts.create')
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('posts', [
                TD::make('title')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(function (BlogPost $post) {
                        return Link::make($post->title)
                            ->route('platform.blog.posts.edit', $post);
                    }),
                TD::make('category.name', 'Category')
                    ->sort()
                    ->render(function (BlogPost $post) {
                        return $post->category ? $post->category->name : '-';
                    }),
                TD::make('status')
                    ->sort()
                    ->render(function (BlogPost $post) {
                        return ucfirst($post->status);
                    }),
                TD::make('featured_image')
                    ->render(function (BlogPost $post) {
                        // If featured_image is array/json, display first image or placeholder
                        if (!empty($post->featured_image)) {
                            $images = json_decode($post->featured_image, true);
                            return isset($images[0]) ? 'Image uploaded' : '-';
                        }
                        return '-';
                    }),
                TD::make('published_at', 'Published')
                    ->sort()
                    ->render(function (BlogPost $post) {
                        return $post->published_at?->format('Y-m-d');
                    }),
                TD::make('created_at', 'Created')
                    ->sort()
                    ->render(function (BlogPost $post) {
                        return $post->created_at->format('Y-m-d');
                    }),

                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function (BlogPost $post) {
                        return Group::make([
                            Link::make('')
                                ->icon('eye')
                                ->route('platform.blog.posts.view', $post),

                            Link::make('')
                                ->icon('pencil')
                                ->route('platform.blog.posts.edit', $post),
                        ])->fullWidth();
                    }),
            ])
        ];
    }
}
