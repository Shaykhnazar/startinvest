<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'featured_image' => $this->when($this->featured_image, "/storage/$this->featured_image"),
            'status' => $this->status,
            'published_at' => $this->published_at?->format('F j, Y'),
            'views_count' => $this->viewsCount(),
            'unique_views_count' => $this->uniqueViewsCount(),
            'category' => $this->whenLoaded('category', function () {
                return new BlogCategoryResource($this->category);
            }),
            $this->mergeWhen(in_array($request->route()->getName(), ['blog.edit', 'blog.show']), [
                'content' => $this->content,
                'author' => new UserResource($this->author),
                'upvotes' => $this->upvotes,
                'downvotes' => $this->downvotes,
                'comments' => CommentResource::collection($this->whenLoaded('comments')),
                'comments_count' => $this->whenCounted('comments'),
            ])
        ];
    }
}
