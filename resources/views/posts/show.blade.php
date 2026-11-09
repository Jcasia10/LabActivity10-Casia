@extends('layouts.app')

@section('title', $post->title . ' – Barangay Bulletin')

@section('content')
    <a href="{{ route('posts.index') }}" class="text-sm font-semibold text-[#0d5421] hover:text-green-800">&larr; Back to bulletin</a>
    <article class="mt-5 rounded-xl bg-white p-6 shadow sm:p-10">
        <div class="mb-4 flex flex-wrap items-center gap-2 text-sm">
            <span class="rounded-full bg-green-100 px-3 py-1 text-[#0d5421]">{{ $post->category }}</span>
            @if ($post->is_pinned)
                <span class="rounded-full bg-amber-100 px-3 py-1 font-semibold text-amber-800">Pinned</span>
            @endif
        </div>
        <h1 class="text-3xl font-bold text-slate-900">{{ $post->title }}</h1>
        <p class="mt-2 text-sm font-medium text-[#0d5421]">Posted by {{ $post->author->name }}</p>
        <p class="mt-2 text-sm text-slate-500">{{ $post->published_at?->format('F d, Y g:i A') }} &middot; {{ $post->views }} views</p>
        <div class="mt-8 whitespace-pre-line leading-8 text-slate-700">{{ $post->body }}</div>
    </article>
@endsection
