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
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Waktu Masuk</th>
                            <th scope="col">Jumlah Item</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
