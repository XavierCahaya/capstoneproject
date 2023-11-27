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
            <h3>Tambah Promo</h3>
            <a href="{{ route('semua.promo') }}" class="btn btn-primary btn-sm text-white d-flex align-items-center ms-auto">
                kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('add.promo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama :</label>
                    <input type='text' name='title' class='form-control' id="name" required>
                </div>
                <div class="mb-3">
                    <label for="image">Gambar :</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input type='file' name='image' class='form-control' id="image" required onchange="previewImage()">
                    <p>Usahakan gambar berukuran 1600 x 900 pixel</p>
                </div>
                <div class="mb-3">
                    <label for="status">Status :</label> <br/>
                    <input type="checkbox" name='status' style="width:30px;height:30px" id="status"> <br>
                    <p>Ceklist kotak untuk mengaktifkan promo</p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
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