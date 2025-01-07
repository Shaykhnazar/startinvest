<?php

namespace App\Orchid\Screens\Blog;

use App\Models\BlogPost;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;

class PostDetailScreen extends Screen
{
    public $post;

    public function query(BlogPost $post): array
    {
        $post->load('category');

        return [
            'post' => $post
        ];
    }

    public function name(): ?string
    {
        return $this->post->title;
    }

    public function description(): ?string
    {
        return 'Post Details';
    }

    public function commandBar(): array
    {
        return [
            Link::make('Edit')
                ->icon('pencil')
                ->route('platform.blog.posts.edit', $this->post->id),

            Link::make('Back')
                ->icon('arrow-left')
                ->route('platform.blog.posts'),

            Button::make('Delete')
                ->icon('trash')
                ->method('delete')
                ->confirm('Are you sure you want to delete this post?'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::legend('post', [
                Sight::make('title', 'Title'),

                Sight::make('content', 'Content')
                    ->render(function ($post) {
                        return view('partials.markdown-content', [
                            'content' => $post->content
                        ]);
                    }),

                Sight::make('category.name', 'Category')
                    ->render(function ($post) {
                        return $post->category ? $post->category->name : '-';
                    }),

                Sight::make('status', 'Status')
                    ->render(function ($post) {
                        return ucfirst($post->status);
                    }),

                Sight::make('published_at', 'Published Date')
                    ->render(function ($post) {
                        return $post->published_at ? $post->published_at->format('F j, Y, g:i a') : '-';
                    }),

                Sight::make('featured_image', 'Featured Image')
                    ->render(function ($post) {
                        if (!empty($post->featured_image)) {
                            return "<img src='{$post->featured_image}' class='img-fluid' style='max-width: 300px;' />";
                        }
                        return 'No image';
                    }),

                Sight::make('excerpt', 'Excerpt')
                    ->render(function ($post) {
                        return $post->excerpt ?? '-';
                    }),

                Sight::make('created_at', 'Created')
                    ->render(function ($post) {
                        return $post->created_at->format('F j, Y, g:i a');
                    }),

                Sight::make('updated_at', 'Last Updated')
                    ->render(function ($post) {
                        return $post->updated_at->format('F j, Y, g:i a');
                    }),
            ])->title('Post Information'),

            // You could add more layouts here for related content
            // Like comments, related posts, etc.
        ];
    }

    public function delete(BlogPost $post)
    {
        $post->delete();

        return redirect()->route('platform.blog.posts');
    }
}
