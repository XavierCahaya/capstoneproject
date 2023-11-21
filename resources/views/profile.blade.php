@extends('layouts.main')

@section('container')

<div class="container">
    <div class="profil">
        <div class="card mt-xxl-5">
            <div class="card-body py-xxl-5 py-5 px-xxl-0 px-xl-0 px-md-5 px-5">
                <div class="content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xxl-4 col-xl-4 d-flex align-items-center justify-content-center">
                            <div class="img-brand">
                                <img src="{{ asset('image/logo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 d-flex align-items-center">
                            <div class="content">
                                <div class="title text-xxl-center text-xl-center text-center text-md-start my-4">
                                    <h1>Hallo N'Jajaners!</h1>
                                </div>
                                <div class="desc-umkm">
                                    <p>Selamat datang di N'Jajan, tempatnya untuk menikmati kelezatan aneka olahan mi dan es! Jelajahi menu kami yang kaya akan pilihan, mulai dari mie spesial hingga es segar yang memikat lidah Anda.
                                        Nikmati kemudahan dalam menelusuri menu, memesan secara online di website kami, dan mengambil pesanan langsung di lokasi kami.
                                        N'Jajan menghadirkan pengalaman makanan yang lezat dan praktis untuk memenuhi nafsu makan Anda. Selamat menikmati sajian istimewa dari N'Jajan!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="keunggulan my-xxl-5 my-4">
        <div class="content">
            <div class="title-keunggulan d-flex justify-content-center text-center mb-xxl-4 mb-4">
                <h1>Keunggulan</h1>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-xxl-4 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 3rem">
                            <h5 class="card-title">Inovasi Rasa yang Menggoda</h5>
                            <p class="card-text mt-3">
                                N'Jajan menonjolkan inovasi rasa unggul dalam hidangan mi dan es. Dari bumbu mi unik hingga es lezat, setiap sajian dirancang untuk memanjakan lidah dengan sensasi baru dan tak terlupakan. Nikmati pengalaman kuliner istimewa yang menggabungkan cita rasa tradisional dengan sentuhan modern di N'Jajan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 my-xxl-0 my-xl-0 my-md-4 my-4">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 3rem">
                            <h5 class="card-title">Pilihan Menu Beragam</h5>
                            <p class="card-text mt-3">
                                Temukan ragam pilihan mi dan es yang memikat hati Anda.
                                Dari mi khas N'Jajan hingga es segar dengan aneka rasa, kami menyajikan menu yang beragam untuk memenuhi selera semua pelanggan.
                                Pilihan yang luas ini memastikan bahwa setiap kunjungan Anda ke N'Jajan adalah petualangan kuliner yang berbeda setiap kali.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 3rem">
                            <h5 class="card-title">Pesan Online atau Ambil di Tempat</h5>
                            <p class="card-text mt-3">
                                Kami prioritaskan kenyamanan pelanggan dengan layanan pemesanan online yang mudah dan cepat di N'Jajan. Pesan hidangan favorit Anda melalui platform online kami, dan nikmati kemudahan pengambilan di tempat. Dengan ini, Anda dapat menikmati kuliner istimewa tanpa menunggu lama atau meninggalkan kenyamanan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
