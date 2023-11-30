@extends('admin.layouts.main')

@section('container')
    <h1 class="text-center mb-5">Selamat Datang Admin</h1>   
    <div class="containerCard d-flex align-items-center justify-content-center ">
        
        <div class="card" style="width: 15rem;">
            <div class="headOrderIn d-flex flex-column text-light align-items-center justify-content-center">
                <span class="icon"><i class="ri-login-circle-line"></i></span>
                <h5 class="card-title m-0 text-center">Pesanan Masuk</h5>
            </div>
            <div class="card-body">
                @if($pesananMasuk > 0)
                <p class="cardCount card-text text-center m-0">{{ $pesananMasuk }}</p>
                <p class="card-text text-center">Pesanan</p>
                @else
                <p class="card-text text-center my-4">Belum Ada Pesanan</p> 
                @endif
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center">
                    <a href="{{ route('orderIn') }}" style="a:target-new:tab">Pesanan Masuk
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="card" style="width: 15rem;">
            <div class="headOrderProcess d-flex flex-column text-light align-items-center justify-content-center ">
                <span class="icon"><i class="ri-time-line"></i></span>
                <h5 class="card-title m-0 text-center">Pesanan Diproses</h5>
            </div>
            <div class="card-body">
                @if($pesananDiproses > 0)
                <p class="cardCount card-text text-center m-0">{{ $pesananDiproses }}</p>
                <p class="card-text text-center">Pesanan</p>
                @else
                <p class="card-text text-center my-4">Belum Ada Pesanan</p> 
                @endif
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center">
                    <a href="{{ route('orderProcess') }}" style="a:target-new:tab">Pesanan Diproses 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="card" style="width: 15rem;">
            <div class="headOrderDone d-flex flex-column text-light align-items-center justify-content-center ">
                <span class="icon"><i class="ri-checkbox-circle-line"></i></span>
                <h5 class="card-title m-0 text-center">Pesanan Selesai</h5>
            </div>
            <div class="card-body">
                @if($pesananSelesai > 0)
                <p class="cardCount card-text text-center m-0">{{ $pesananSelesai }}</p>
                <p class="card-text text-center">Pesanan</p>
                @else
                <p class="card-text text-center my-4">Belum Ada Pesanan</p> 
                @endif
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center">
                    <a href="{{ route('orderComplete') }}" style="a:target-new:tab">Pesanan Selesai
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                      </svg>
                    </a>
                </li>
            </ul>
        </div>   
       
    </div>
@endsection