<?php

namespace App\Orchid\Screens\Blog;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Carbon\Carbon;
use League\HTMLToMarkdown\HtmlConverter;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Fields\SimpleMDE;

class PostEditScreen extends Screen
{
    public $post;

    public function query(BlogPost $post): array
    {
        return [
            'post' => $post
        ];
    }

    public function name(): ?string
    {
        return $this->post->exists ? 'Edit Post' : 'Create Post';
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create post')
                ->icon('plus')
                ->method('createOrUpdate')
                ->canSee(!$this->post->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->post->exists),

            Button::make('Delete')
                ->icon('trash')
                ->method('delete')
                ->canSee($this->post->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::tabs([
                'Main' => [
                    Layout::rows([
                        Input::make('post.title')
                            ->title('Title')
                            ->placeholder('Post title')
                            ->required(),

                        SimpleMDE::make('post.content')
                            ->title('Content')
//                            ->value(function ($value, $model) {
//                                if ($model && $model['post']->content) {
//                                    return $model['post']->content;
//                                }
//                                return $value ?? '';
//                            })
                            ->placeholder('Enter post content'),

                        TextArea::make('post.excerpt')
                            ->title('Excerpt')
                            ->rows(3),

                        Select::make('post.category_id')
                            ->title('Category')
                            ->fromModel(BlogCategory::class, 'name'),

                        Select::make('post.status')
                            ->title('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->required(),

                        DateTimer::make('post.published_at')
                            ->title('Publish date')
                            ->format('Y-m-d H:i:s')
                            ->help('Leave empty to automatically set when publishing'),

                        Cropper::make('post.featured_image')
                            ->title('Post Image')
                            ->maxWidth(1024)
                            ->maxHeight(1024)
                            ->required(),
                    ])
                ]
            ])
        ];
    }

    public function createOrUpdate(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'post.title' => 'required|string|max:255',
            'post.content' => 'required|string',
            'post.excerpt' => 'nullable|string',
            'post.category_id' => 'nullable|exists:blog_categories,id',
            'post.status' => 'required|in:draft,published',
            'post.published_at' => 'nullable|date',
            'post.featured_image' => 'required|string',
        ]);

        // Extract validated data
        $data = $validated['post'];

//        dd($data);
        // Handle featured image
        if (isset($data['featured_image'])) {
            // Remove domain if present and keep only the path after /storage/
            if (preg_match('/\/storage\/(.*)/', $data['featured_image'], $matches)) {
                $data['featured_image'] = $matches[1];
            }
        }

        // Convert Markdown back to HTML
//        if (isset($data['content'])) {
//            $parsedown = new \Parsedown();
//            $data['content'] = $parsedown->parse($data['content']);
//        }

        // Handle published_at date
        if ($data['status'] === 'published') {
            // If status is published and no published_at date is set, set it to now
            if (empty($data['published_at']) && (!$post->exists || $post->status !== 'published')) {
                $data['published_at'] = Carbon::now();
            }
        } else {
            // If status is draft, clear the published_at date
            $data['published_at'] = null;
        }

        // Fill the model with validated data
        $post->fill([
            'title' => $data['title'],
            'content' => $data['content'],
            'excerpt' => $data['excerpt'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'status' => $data['status'],
            'published_at' => $data['published_at'] ?? null,
            'featured_image' => $data['featured_image'] ?? null,
        ]);

        if (!$post->slug) {
            $post->slug = Str::slug($post->title);
        }

        $post->save();

        return redirect()->route('platform.blog.posts');
    }

    public function delete(BlogPost $post)
    {
        $post->delete();

        return redirect()->route('platform.blog.posts');
    }
}

