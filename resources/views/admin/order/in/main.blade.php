@extends('admin.layouts.main')

@section('container')

<div class="content">
    <div class="title-table h1 text-center mb-3">Data Pesanan Masuk</div>
    <div class="content-tabs">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link" href="{{ route('orderIn.delivery') }}">Delivery</a>
            </li>
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link" href="{{ route('orderIn.dineIn') }}">Dine-in</a>
            </li>
            <li class="nav-item mx-3 mb-3">
                <a class="nav-link" href="{{ route('orderIn') }}">Semua</a>
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
    
@endsection

    
