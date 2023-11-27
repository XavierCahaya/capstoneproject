@extends('admin.layouts.main')

@section('container')
<style>
    .hide-on-small {
        display: table-cell !important;
    }
    .details-row {
    display: none;
    }
    @media (max-width: 550px) {
        .hide-on-small {
            display: none !important;
        }
        .details-row {
            display: table-row !important;
        }
    }
</style>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center hide-on-small">Nama</th>
                                <th class="text-center hide-on-small">Gambar</th>
                                <th class="text-center hide-on-small">Status</th>
                                <th class="text-center hide-on-small">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promos as $promo)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle hide-on-small">{{ $promo->title }}</td>
                                    <td class="text-center align-middle hide-on-small">
                                        <img src="{{ asset('images/promo/' . $promo->image) }}" style="width:140px;height:110px" alt="Promo">
                                    </td>
                                    <td class="text-center align-middle hide-on-small">{{ $promo->status == '1' ? 'Nonaktif':'Aktif'}}</td>
                                    <td class="text-center align-middle hide-on-small">
                                        <a href="{{ route('form.update.promo', $promo->id) }}" class="btn btn-success m-1">Edit</a>
                                        <a href="{{ route('delete.promo', $promo->id) }}" class="btn btn-danger m-1" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                                {{-- Add detail row for small screens --}}
                                <tr class="details-row hide-on-large">
                                    <td colspan="5" class="d-flex justify-content-center">
                                        <div>
                                            <p><strong>Nama:</strong> {{ $promo->title }}</p>
                                            <p><strong>Gambar:</strong></p>
                                            <img src="{{ asset('images/promo/' . $promo->image) }}" style="width:140px;height:110px" alt="Promo">
                                            <p><strong>Status:</strong> {{ $promo->status == '1' ? 'Nonaktif':'Aktif'}}</p>
                                            <p class="text-center">
                                                <a href="{{ route('form.update.promo', $promo->id) }}" class="btn btn-success m-1">Edit</a>
                                                <a href="{{ route('delete.promo', $promo->id) }}" class="btn btn-danger m-1" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection