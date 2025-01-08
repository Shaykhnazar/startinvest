<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        // Category filter
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->latest('published_at')
            ->paginate(12)
            ->withQueryString();

        $categories = BlogCategory::withCount(['posts' => function ($query) {
            $query->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now());
        }])->whereHas('posts', function ($query) {
            $query->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now());
        })->get();

        return Inertia::render('Blog/Index', [
            'posts' => BlogPostResource::collection($posts),
            'categories' => BlogCategoryResource::collection($categories),
            'filters' => $request->only(['category']),
        ]);
    }

    public function show(BlogPost $post)
    {
        // Check if post is published
        if ($post->status !== 'published' ||
            !$post->published_at ||
            $post->published_at->isFuture()) {
            abort(404);
        }

        // Add view
        $post->addView();
        $post->load('category');

        // Get related posts from same category
        $relatedPosts = BlogPost::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return Inertia::render('Blog/Show', [
            'post' => new BlogPostResource($post),
            'relatedPosts' => BlogPostResource::collection($relatedPosts),
        ]);
    }

    public function category(BlogCategory $category)
    {
        $posts = BlogPost::where('category_id', $category->id)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(12);

        $categories = BlogCategory::withCount(['posts' => function ($query) {
            $query->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now());
        }])->whereHas('posts', function ($query) {
            $query->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now());
        })->get();

        return Inertia::render('Blog/Category', [
            'category' => new BlogCategoryResource($category),
            'posts' => BlogPostResource::collection($posts),
            'categories' => BlogCategoryResource::collection($categories),
        ]);
    }
}
