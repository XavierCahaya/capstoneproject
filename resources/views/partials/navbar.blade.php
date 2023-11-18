<nav class="navbar sticky-top navbar-expand-lg px-3">
    <div class="container-fluid">
<<<<<<< HEAD
        <a class="navbar-brand" href="/">N'Jajan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            data-bs-theme="light">
=======
        <a class="navbar-brand" href="{{ route('beranda') }}">N'Jajan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-bs-theme="light">
>>>>>>> 591479acd6ae8c9c9067a887f9266a088bcc721a
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="/menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kategori') ? 'active' : '' }}" href="/kategori">Kategori</a>
                </li>
                <li class="nav-item">
<<<<<<< HEAD
                    <a class="nav-link {{ request()->is('cekPesanan') ? 'active' : '' }}" href="/cekPesanan">Cek
                        Pesanan</a>
=======
                    <a class="nav-link {{ request()->is('user/cekpesanan') ? 'active' : '' }}" href="{{ route('cekpesanan') }}">Cek Pesanan</a>
>>>>>>> 591479acd6ae8c9c9067a887f9266a088bcc721a
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/login">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr>
