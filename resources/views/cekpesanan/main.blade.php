@extends('layouts.main')

@section('container')
<div class="cekpesanan d-flex align-items-center justify-content-center">
    <div class="content">
        <div class="title-page text-center mb-3">
            <h1>Cek Pesanan</h1>
        </div>
        <div class="content-tabs">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link" href="{{ route('cek.delivery') }}">Delivery</a>
                </li>
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link" href="{{ route('cek.dineIn') }}">Dine-in</a>
                </li>
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link" href="{{ route('cek.semua') }}">Semua</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-body">
                @yield('content-table')
            </div>
        </div>
    </div>
</div>

@include('cekpesanan.modal.detail')

@endsection
