@extends('admin.layouts.main')

@section('container')


<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        </div>
        <div class="card">
            <div class="card-header d-flex">
                <h3>List Promo</h3>
                <a href="{{ route('form.create.promo') }}" class="btn btn-primary btn-sm text-white d-flex align-items-center ms-auto">
                    Tambah Promo
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promos as $promo)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $promo->title }}</td>
                                <td class="text-center align-middle">
                                    <img src="{{ asset('images/promo/' . $promo->image) }}" style="width:140px;height:110px" alt="Promo">
                                </td>
                                <td class="text-center align-middle">{{ $promo->status == '1' ? 'Nonaktif':'Aktif'}}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('form.update.promo', $promo->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('delete.promo', $promo->id) }}" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection