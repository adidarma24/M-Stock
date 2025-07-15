@extends('dashboard.layouts.app')
@section('title', isset($category) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
    <h2>{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori</h2>

    <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $category->description ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
