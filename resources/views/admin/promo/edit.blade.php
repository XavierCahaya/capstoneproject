@extends('admin.layouts.main')
@section('container')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </div>

    <div class="card">
        <div class="card-header d-flex">
            <h3>Edit Promo</h3>
            <a href="{{ route('semua.promo') }}" class="btn btn-primary btn-sm text-white d-flex align-items-center ms-auto">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('update.promo', $promos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Nama :</label>
                    <input type='text' name='title' class='form-control' id="name" value="{{ old('title', $promos->title) }}">
                </div>
                <div class="mb-3">
                    <label for="image">Gambar :</label>
                    <input type='file' name='image' class='form-control' id="image">
                    <img src="{{ asset($promos->image) }}" style="width:140px;height:110px" alt="Promo">
                </div>
                <div class="mb-3">
                    <label for="status">Status :</label> <br/>
                    <input type="checkbox" name='status' style="width:30px;height:30px" id="status" {{ $promos->status == '1' ? 'checked' : '' }}> <br>
                    <p>Ceklist kotak untuk mengaktifkan promo</p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
