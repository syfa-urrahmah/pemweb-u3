@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="stack-lg">
        <section class="card">
            <h2 style="margin: 0 0 0.4rem;">Portal Berita Sederhana</h2>
            <p style="margin: 0 0 0.75rem;">
                Selamat datang di portal berita sederhana berbasis Laravel.
                Berita di bawah ini diambil dari tabel <code>articles</code>.
            </p>

            @guest
                <p class="muted" style="margin: 0;">
                    Kamu belum login. Untuk mengelola berita, silakan
                    <a href="{{ route('login') }}">Login</a> atau
                    <a href="{{ route('register') }}">Register</a>.
                </p>
            @endguest

            @auth
                <p class="muted" style="margin: 0 0 0.85rem;">
                    Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>.
                    Kamu dapat menambah berita di menu
                    <a href="{{ route('articles.index') }}">Artikel</a>.
                </p>
                <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">+ Tulis Artikel</a>
            @endauth
        </section>

        <section class="card">
            <h3 style="margin: 0 0 1rem;">Berita Terbaru</h3>

            @if ($articles->isNotEmpty())
                <div class="row">
                    @foreach ($articles as $article)
                        <article class="card" style="padding: 1rem;">
                            <div class="news-card-body">
                                <img src="{{ $article->image_url }}"
                                     alt="Gambar {{ $article->title }}"
                                     class="news-thumb">
                                <div>
                                    <h4 style="margin: 0 0 0.3rem;">
                                        <a href="{{ route('articles.show', $article) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h4>
                                    <p class="muted" style="margin: 0 0 0.5rem;">
                                        Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
                                        oleh {{ $article->user->name }}
                                    </p>
                                    <p style="margin: 0 0 0.65rem; font-size: 0.93rem;">
                                        {{ \Illuminate\Support\Str::limit($article->body, 140) }}
                                    </p>
                                    <a href="{{ route('articles.show', $article) }}" style="font-size: 0.9rem; font-weight: 600;">
                                        Baca selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="muted" style="margin: 0;">
                    Belum ada berita yang tersedia.
                    @auth
                        Silakan buat berita baru di menu
                        <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
                    @endauth
                </p>
            @endif
        </section>
    </div>
@endsection