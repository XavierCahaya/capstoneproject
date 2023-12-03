@extends('admin.layouts.main')

@section('container')

<div class="content">
    <div class="title-table h1 text-center mb-3">Data Pesanan Proses</div>
    <div class="content-tabs">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link {{ request()->is('cms/order/sub-orderProcess/OrderProcess/semua') ? 'active' : '' }}" href="{{ route('orderProcess') }}">Semua</a>
            </li>
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link {{ request()->is('cms/order/sub-orderProcess/OrderProcess/dineIn') ? 'active' : '' }}" href="{{ route('orderProcess.dineIn') }}">Dine-in</a>
            </li>
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link {{ request()->is('cms/order/sub-orderProcess/OrderProcess/delivery') ? 'active' : '' }}" href="{{ route('orderProcess.delivery') }}">Delivery</a>
            </li>
        </ul>
    </div>
    <div class="wrapperInLink d-flex justify-content-between align-items-center">
        <div class="d-flex text-center align-items-center justify-content-end mb-2">
            <a href="{{ route('orderIn') }}" class="inLink p-2 text-light rounded d-flex align-items-center" style="a:target-new:tab;background-color: #fc3e24">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                </svg>
                Menuju Pesanan Masuk
            </a>
        </div>
        <div class="d-flex text-center align-items-center justify-content-end mb-2">
            <a href="{{ route('orderComplete') }}" class="inLink p-2 text-light rounded d-flex align-items-center" style="a:target-new:tab;background-color: rgb(15, 177, 15)">Menuju Pesanan Selesai
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                @yield('content-table')
            </div>
        </div>
    </div>
</div>
    
@include('admin.order.modal.detail')

@endsection

    
