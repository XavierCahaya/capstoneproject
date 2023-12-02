@extends('layouts.main')

@section('container')

<div class="cekpesanan">
    <div class="content">
        <div class="title-page text-center mb-3">
            <h1>Cek Pesanan</h1>
        </div>
        <div class="content-tabs">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link {{ request()->is('user/cekpesanan/semua') ? 'active' : '' }}" href="{{ route('cek.semua') }}">Semua</a>
                </li>
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link {{ request()->is('user/cekpesanan/delivery') ? 'active' : '' }}" href="{{ route('cek.delivery') }}">Delivery</a>
                </li>
                <li class="nav-item mx-3 mb-3">
                    <a class="nav-link {{ request()->is('user/cekpesanan/dineIn') ? 'active' : '' }}" href="{{ route('cek.dineIn') }}">Dine-in</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    @yield('content-table')
                </div>
            </div>
        </div>
    </div>
</div>

@include('cekpesanan.modal.detail')

@endsection
