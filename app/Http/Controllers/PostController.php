<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()
            ->with('author')
            ->where('is_published', true)
            ->when($request->filled('q'), fn ($query) => $query->where('title', 'like', '%' . $request->string('q') . '%'))
            ->when($request->filled('category'), fn ($query) => $query->where('category', $request->string('category')))
            ->orderByDesc('is_pinned')
            ->latest('published_at')
            ->paginate(5)
            ->withQueryString();

        $categories = Post::query()->distinct()->orderBy('category')->pluck('category');

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show(int $id)
    {
        $post = Post::query()
            ->with('author')
            ->where('is_published', true)
            ->findOrFail($id);

        $post->views++;
        $post->save();

        return view('posts.show', compact('post'));
    }
}
