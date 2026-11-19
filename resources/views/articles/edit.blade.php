@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
    <section class="card">
        <h2 style="margin: 0 0 0.3rem;">Edit Artikel / Berita</h2>
        <p class="muted" style="margin: 0 0 1rem;">
            Perbarui data berita di bawah ini. Kosongkan URL gambar untuk kembali
            memakai gambar placeholder.
        </p>

        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul Artikel</label>
                <input type="text" id="title" name="title"
                       value="{{ old('title', $article->title) }}"
                       required placeholder="Masukkan judul berita">
            </div>

            <div class="form-group">
                <label for="image">URL Gambar (opsional)</label>
                <input type="url" id="image" name="image"
                       value="{{ old('image', $article->image) }}"
                       placeholder="https://example.com/gambar.jpg">
            </div>

            <div class="form-group">
                <p class="muted" style="margin: 0 0 0.4rem;">Pratinjau gambar saat ini:</p>
                <img src="{{ $article->image_url }}" alt="Gambar artikel"
                     style="width: 100%; max-width: 400px; max-height: 220px; object-fit: cover; border-radius: var(--radius-sm);">
            </div>

            <div class="form-group">
                <label for="body">Isi Berita</label>
                <textarea id="body" name="body" rows="8"
                          required>{{ old('body', $article->body) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Artikel</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </section>
@endsection