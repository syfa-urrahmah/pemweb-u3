@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <article class="card">
        <h2 style="margin: 0;">{{ $article->title }}</h2>
        <p class="muted" style="margin: 0.35rem 0 0;">
            Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
            oleh <strong>{{ $article->user->name }}</strong>
        </p>

        <div style="margin: 1.25rem 0;">
            <img src="{{ $article->image_url }}"
                 alt="Gambar untuk {{ $article->title }}"
                 style="width: 100%; max-height: 360px; object-fit: cover; border-radius: var(--radius);">
        </div>

        <div style="margin-top: 1rem; font-size: 1rem;">
            {!! nl2br(e($article->body)) !!}
        </div>

        <div class="form-actions" style="margin-top: 1.75rem; padding-top: 1rem; border-top: 1px solid var(--border);">
            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">&larr; Kembali ke Home</a>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary btn-sm">Lihat semua artikel</a>

            @auth
                @if ($article->user_id === auth()->id())
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary btn-sm">Edit Artikel</a>
                @endif
            @endauth
        </div>
    </article>
@endsection