@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <section class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <div>
                <h2 style="margin: 0;">Daftar Artikel</h2>
                <p class="muted" style="margin: 0.2rem 0 0;">Kelola artikel yang telah dipublikasikan.</p>
            </div>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Artikel Baru</a>
        </div>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($articles->isNotEmpty())
            <ul class="article-list">
                @foreach ($articles as $article)
                    <li class="article-item">
                        <div>
                            <a href="{{ route('articles.show', $article) }}" class="article-title-link">
                                {{ $article->title }}
                            </a>
                            <div class="muted">
                                oleh {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                            </div>
                        </div>

                        @if ($article->user_id === auth()->id())
                            <div class="article-actions">
                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <form action="{{ route('articles.destroy', $article) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            <div class="pagination-wrap">
                {{ $articles->links('pagination::default') }}
            </div>
        @else
            <p class="muted" style="margin-top: 1rem;">Belum ada artikel.</p>
        @endif
    </section>
@endsection