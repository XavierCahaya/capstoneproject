@extends('admin.layouts.main')

@section('container')

<div class="content">
    <div class="title-table h1 text-center mb-3">Data Pesanan Masuk</div>
    <div class="content-tabs">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link {{ request()->is('cms/order/sub-orderIn/OrderIn/semua') ? 'active' : '' }}" href="{{ route('orderIn') }}">Semua</a>
            </li>
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link {{ request()->is('cms/order/sub-orderIn/OrderIn/dineIn') ? 'active' : '' }}" href="{{ route('orderIn.dineIn') }}">Dine-in</a>
            </li>
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link {{ request()->is('cms/order/sub-orderIn/OrderIn/delivery') ? 'active' : '' }}" href="{{ route('orderIn.delivery') }}">Delivery</a>
            </li>
        </ul>
    </div>
    <div class="d-flex text-center align-items-center justify-content-end mb-2">
        <a href="{{ route('orderProcess') }}" class="inLink p-2 text-light rounded d-flex align-items-center" style="a:target-new:tab;background-color: rgb(227, 176, 7)">Menuju Pesanan Diproses 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
        </a>
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

    
