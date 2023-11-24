@extends('admin.layouts.main')

@section('container')

<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="card-title text-center my-3">
                <h1>Edit Data Produk</h1>
            </div>
            <form action="{{ route('update.product', $products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $products->name) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ( $products->image )
                    <input type="hidden" name="image" id="image" class="form-control" value="{{ $products->image }}">
                        <p>Gambar : {{ $products->image }}</p>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($category as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $products->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $products->price) }}" required>
                </div>

                <div class="form-group mb-4">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', $products->description) }}</textarea>
                </div>

                <div class="button-group my-3 text-center">
                    <a href="{{ route('semua.menu') }}">
                        <button type="button" class="btn btn-dark me-3">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
