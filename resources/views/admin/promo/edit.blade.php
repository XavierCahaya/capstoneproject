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
                    @if($promos->image)
                        <img src="{{ asset('images/promo/'. $promos->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type='file' name='image' class='form-control' id="image" required onchange="previewImage()">
                    <p>Usahakan gambar berukuran 1600 x 900 pixel</p>
                </div>
                <div class="mb-3">
                    <label for="status">Status :</label> <br/>
                    <input type="checkbox" name='status' style="width:30px;height:30px" id="status" {{ $promos->status == '0' ? 'checked' : '' }}> <br>
                    <p>Ceklist kotak untuk mengaktifkan promo</p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
