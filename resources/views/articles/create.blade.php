@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
    <section class="card">
        <h2 style="margin: 0 0 0.3rem;">Tambah Artikel / Berita</h2>
        <p class="muted" style="margin: 0 0 1rem;">
            Isi formulir di bawah untuk menambahkan berita baru. Gambar menggunakan
            URL (opsional); jika kosong, sistem memakai placeholder online.
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

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Judul Artikel</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       required placeholder="Masukkan judul berita">
            </div>

            <div class="form-group">
                <label for="image">URL Gambar (opsional)</label>
                <input type="url" id="image" name="image" value="{{ old('image') }}"
                       placeholder="https://example.com/gambar.jpg">
                <p class="muted" style="margin: 0.35rem 0 0;">
                    Jika dikosongkan, sistem memakai gambar placeholder dari
                    <code>picsum.photos</code>.
                </p>
            </div>

            <div class="form-group">
                <label for="body">Isi Berita</label>
                <textarea id="body" name="body" rows="8" required
                          placeholder="Tulis isi berita di sini...">{{ old('body') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </section>
@endsection