@extends('cekpesanan.main')

@section('content-table')

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tanggal Masuk</th>
            <th>Opsi Pemesanan</th>
            <th>Nama Pemesan</th>
            <th>Nomer Telepon</th>
            <th>Alamat</th>
            <th>Jumlah Pesanan</th>
            <th>Status Pesanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order as $index => $od)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $od->created_at }}</td>
            <td>{{ $od->delivery_option }}</td>
            <td>{{ $od->orderer_name }}</td>
            <td>{{ $od->phone  ?: '-' }}</td>
            <td>{{ $od->address  ?: '-' }}</td>
            <td>{{ $od->getTotalItemsAttribute() }}</td>
            <td>{{ $od->status }}</td>
            <td>
                <a href="" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdropView{{ $od->id }}"">  
                    Detail                 
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection