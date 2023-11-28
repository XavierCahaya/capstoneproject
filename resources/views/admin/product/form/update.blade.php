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
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    @if($products->image)
                    <img src="{{ asset('images/product/'. $products->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type="file" name="image" id="image" class="form-control" required onchange="previewImage()">
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

                <div class="form-group mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', $products->description) }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <input class="form-check-input" type="checkbox" name="status" id="status" {{ $products->status == 'Aktif' ? 'checked' : '' }}>
                    <label class="form-check-label ms-2" for="status">
                        - Centang Untuk Mengaktifkan Produk <br>
                        - Hilangkan Centang Untuk Menonaktifkan Produk
                    </label>
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

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL( image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection
