@extends('layouts.main')

@section('container')
<div class="cekpesanan d-flex align-items-center justify-content-center">
    <div class="content">
        <div class="title-page text-center mb-5">
            <h1>Cek Pesanan</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Masuk</th>
                            <th>Opsi Pemesanan</th>
                            <th>Nama Pemesan</th>
                            <th>Nomer Telepon</th>
                            <th>Alamat</th>
                            <th>Total Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $index => $od)
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $od->created_at }}</td>
                            <td>{{ $od->delivery_option }}</td>
                            <td>{{ $od->orderer_name }}</td>
                            <td>{{ $od->phone }}</td>
                            <td>{{ $od->address }}</td>
                            <td>{{ $od->total_price }}</td>
                            <td>{{ $od->status }}</td>
                            <td>
                                <a href="" class="btn btn-warning">Detail</a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
