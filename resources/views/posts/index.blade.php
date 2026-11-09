@extends('layouts.app')

@section('title', 'Barangay Bulletin – Purok Casia')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Community announcements</h1>
        <p class="mt-2 text-slate-600">Stay updated with the latest news from our barangay.</p>
    </div>

    <form method="GET" action="{{ route('posts.index') }}" class="mb-8 grid gap-3 rounded-xl bg-white p-4 shadow sm:grid-cols-[1fr_220px_auto]">
        <label class="sr-only" for="q">Search title</label>
        <input id="q" name="q" value="{{ request('q') }}" placeholder="Search title" class="rounded-lg border-slate-300">
        <label class="sr-only" for="category">Category</label>
        <select id="category" name="category" class="rounded-lg border-slate-300">
            <option value="">All categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
            @endforeach
        </select>
        <button class="rounded-lg bg-[#0d5421] px-5 py-2 font-semibold text-white hover:bg-green-800">Filter</button>
    </form>

    <div class="grid gap-5 md:grid-cols-2">
        @forelse ($posts as $post)
            <article class="rounded-xl bg-white p-6 shadow">
                <div class="mb-3 flex flex-wrap items-center gap-2 text-sm">
                    <span class="rounded-full bg-green-100 px-3 py-1 text-[#0d5421]">{{ $post->category }}</span>
                    @if ($post->is_pinned)
                        <span class="rounded-full bg-amber-100 px-3 py-1 font-semibold text-amber-800">Pinned</span>
                    @endif
                </div>
                <h2 class="text-xl font-bold text-slate-900">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:text-[#0d5421]">{{ $post->title }}</a>
                </h2>
                <p class="mt-2 text-sm font-medium text-[#0d5421]">Posted by {{ $post->author->name }}</p>
                <p class="mt-3 line-clamp-3 text-slate-600">{{ $post->body }}</p>
                <div class="mt-5 flex justify-between text-sm text-slate-500">
                    <span>{{ $post->published_at?->format('M d, Y') }}</span>
                    <span>{{ $post->views }} views</span>
                </div>
            </article>
        @empty
            <p class="rounded-xl bg-white p-6 text-slate-600 shadow">No posts match your search.</p>
        @endforelse
    </div>

    <div class="mt-8">{{ $posts->links() }}</div>
    @if ($posts->total() > 0)
        <p class="mt-3 text-sm text-slate-600">Showing {{ $posts->firstItem() }}-{{ $posts->lastItem() }} of {{ $posts->total() }} posts</p>
    @endif
@endsection
