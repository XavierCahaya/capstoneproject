@extends('admin.layouts.main')

@section('container')

<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="card-title text-center my-3">
                <h1>Tambah Data Kategori</h1>
            </div>
            <form action="{{ route('add.category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="button-group">
                    <a href="{{ route('category.menu') }}">
                        <button type="button" class="btn btn-dark">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
