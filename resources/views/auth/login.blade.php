@extends('layouts.main')

@section('container')

<link rel="stylesheet" href="/css/login.css">

@if(session()->has('loginError'))
<div class="row justify-content-center m-2">
    <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container d-flex justify-content-center align-items-center mb-4">
    <div class="row border rounded-3 p-3 bg-white shadow box-area">
        <div class=" d-flex col-md-6 rounded-3 d-flex justify-content-center align-items-center flex-column left-box"
            style="background: #FC3E24">
            <div class="featured-image mb-2">
                <img src="/image/logo.png" class="img-fluid" style="max-width: 250px; max-height: 200px;" alt="logo">
            </div>
            <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600; ">Verifikasi</p>
            <small class="text-white text-wrap text-center mb-1"
                style="width: 18rem; font-family: 'Courier New', Courier, monospace; font-size: 17px; ">Login untuk dapat mengakses Dashboard Admin</small>
        </div>
        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2 class="text-center">Halo Admin!</h2>
                </div>
                <form method="POST" action="{{ route('login.action') }}">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="email" name="email" class="form-control 
                        @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="floatingInput">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        </div>
                    <button type="submit" class="btn btn-lg w-100 fs-6 text-white">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

@endsection
