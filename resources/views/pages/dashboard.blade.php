@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="stack-lg">
        <section class="card">
            <h2 style="margin: 0 0 0.35rem;">Dashboard</h2>
            <p style="margin: 0 0 0.25rem;">Selamat datang, <strong>{{ $user->name }}</strong></p>
            <p class="muted" style="margin: 0;">Ini adalah ringkasan singkat aktivitas artikel di aplikasi kamu.</p>
        </section>

        <section class="row">
            <div class="card">
                <h3 style="margin: 0; font-size: 0.95rem; color: var(--muted);">Total Artikel</h3>
                <p class="stat-value">{{ $totalArticles }}</p>
                <p class="muted" style="margin: 0;">Jumlah seluruh artikel yang ada di sistem.</p>
            </div>

            <div class="card">
                <h3 style="margin: 0; font-size: 0.95rem; color: var(--muted);">Artikel Kamu</h3>
                <p class="stat-value">{{ $myArticles }}</p>
                <p class="muted" style="margin: 0;">Artikel yang dibuat oleh akun kamu.</p>
            </div>

            <div class="card">
                <h3 style="margin: 0 0 0.6rem; font-size: 1rem;">Aksi Cepat</h3>
                <div style="display: flex; flex-direction: column; gap: 0.45rem; font-size: 0.92rem;">
                    <a href="{{ route('articles.create') }}">+ Tambah Artikel Baru</a>
                    <a href="{{ route('articles.index') }}">Lihat Semua Artikel</a>
                    <a href="{{ route('home') }}">Lihat Halaman Home</a>
                </div>
            </div>
        </section>

        <section class="card">
            <h3 style="margin: 0 0 1rem;">Artikel Terbaru</h3>

            @if ($latestArticles->isNotEmpty())
                <div class="row">
                    @foreach ($latestArticles as $article)
                        <article class="card" style="padding: 1rem;">
                            <div class="news-card-body">
                                <img src="{{ $article->image_url }}"
                                     alt="Thumbnail {{ $article->title }}"
                                     class="dash-thumb">
                                <div>
                                    <h4 style="margin: 0 0 0.25rem;">
                                        <a href="{{ route('articles.show', $article) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h4>
                                    <p class="muted" style="margin: 0 0 0.4rem;">
                                        oleh {{ $article->user->name }}
                                        <span>&bull;</span>
                                        <span>{{ $article->created_at->format('d M Y') }}</span>
                                    </p>
                                    <p style="margin: 0; font-size: 0.9rem;">
                                        {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="muted" style="margin: 0;">Belum ada artikel yang bisa ditampilkan.</p>
            @endif
        </section>

        <section class="card">
            <h3 style="margin: 0 0 0.6rem;">Info Akun</h3>
            <ul style="margin: 0 0 0.5rem; padding-left: 1.2rem;">
                <li><strong>Nama:</strong> {{ $user->name }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
            </ul>
            <p class="muted" style="margin: 0;">
                Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.
            </p>
        </section>
    </div>
@endsection