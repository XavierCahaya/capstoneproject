@extends('layouts.main')

@section('container')
    {{-- <div class="card">
        <div class="leftcard">
            <img src={{ asset('image/logo.png') }}>
        </div>
        <div class="rightcard">
            <h1>Hallo N'Jajaners!</h1>
            <p>Selamat datang di N'Jajan, tempatnya untuk menikmati kelezatan aneka olahan mi dan es! Jelajahi menu kami
                yang kaya akan pilihan, mulai dari mie spesial hingga es segar yang memikat lidah Anda.
                Nikmati kemudahan dalam menelusuri menu, memesan secara online di website kami, dan mengambil pesanan
                langsung di lokasi kami.
                N'Jajan menghadirkan pengalaman makanan yang lezat dan praktis untuk memenuhi nafsu makan Anda. Selamat
                menikmati sajian istimewa dari N'Jajan!</p>
        </div>
    </div>

    <div class="buttonpesan">
        <div class="vector1"></div>
        <p class="teks">Pesan Sekarang</p>
        <div class="vector2"></div>
    </div>

    <div class="tigabox">
        <div class="leftC">
            <h3>Inovasi Rasa yang Menggoda</h3>
            <p>N'Jajan membanggakan diri dengan inovasi rasa yang tak tertandingi dalam setiap hidangan mi dan es kami.
                Dari kombinasi bumbu mi yang unik hingga paduan es yang lezat, setiap sajian di N'Jajan diciptakan untuk
                memanjakan lidah Anda dengan sensasi rasa yang baru dan tak terlupakan.</p>
        </div>
        <div class="centerC">
            <h3>Pilihan Menu Beragam</h3>
            <p>Temukan ragam pilihan mi dan es yang memikat hati Anda.
                Dari mi khas N'Jajan hingga es segar dengan aneka rasa, kami menyajikan menu yang beragam untuk memenuhi
                selera semua pelanggan.
                Pilihan yang luas ini memastikan bahwa setiap kunjungan Anda ke N'Jajan adalah petualangan kuliner yang
                berbeda setiap kali.</p>
        </div>
        <div class="rightC">
            <h3>Pesan Online atau Ambil di Tempat</h3>
            <p>Kami mengutamakan kenyamanan pelanggan dengan menyediakan layanan pemesanan online yang mudah dan cepat.
                Pesan hidangan favorit Anda melalui platform online kami, dan nikmati kenyamanan pengambilan di tempat.
                Dengan ini, Anda dapat menikmati kuliner istimewa N'Jajan tanpa harus menunggu lama atau keluar dari zona
                kenyamanan Anda.
            </p>
        </div>
    </div> --}}
    <div class="row mb-5 card-profile">
        <div class="col-lg-4 d-flex justify-content-center">
            <img src={{ asset('image/logo.png') }} class="img-fluid" alt="Logo">
        </div>
        <div class="col-lg-8 mt-5 content-profile">
            <h1>Hallo N'Jajaners!</h1>
            <p>Selamat datang di N'Jajan, tempatnya untuk menikmati kelezatan aneka olahan mi dan es! Jelajahi menu kami
                yang kaya akan pilihan, mulai dari mie spesial hingga es segar yang memikat lidah Anda. Nikmati kemudahan
                dalam menelusuri menu, memesan secara online di website kami, dan mengambil pesanan langsung di lokasi kami.
                N'Jajan menghadirkan pengalaman makanan yang lezat dan praktis untuk memenuhi nafsu makan Anda. Selamat
                menikmati sajian istimewa dari N'Jajan!</p>
        </div>
    </div>

    <div class="row mb-5 justify-content-center">
        <div class="col-lg-6">
            <div class="rectangle">
                <h1>PESAN SEKARANG</h1>
            </div>
        </div>
    </div>

    <div class="row mb-4 mx-5">
        <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center">
            <div class="card card-excess mb-3">
                <div class="card-body">
                    <h5 class="card-title">Inovasi Rasa yang Menggoda</h5>
                    <p class="card-text">N'Jajan membanggakan diri dengan inovasi rasa yang tak tertandingi dalam setiap
                        hidangan mi dan es kami. Dari kombinasi bumbu mi yang unik hingga paduan es yang lezat, setiap
                        sajian di N'Jajan diciptakan untuk memanjakan lidah Anda dengan sensasi rasa yang baru dan tak
                        terlupakan.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center">
            <div class="card card-excess mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pilihan Menu Yang Banyak Ragamnya</h5>
                    <p class="card-text">Temukan ragam pilihan mi dan es yang memikat hati Anda. Dari mi khas N'Jajan hingga
                        es segar dengan aneka rasa, kami menyajikan menu yang beragam untuk memenuhi selera semua pelanggan.
                        Pilihan yang luas ini memastikan bahwa setiap kunjungan Anda ke N'Jajan adalah petualangan kuliner
                        yang berbeda setiap kali.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-center">
            <div class="card card-excess mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pesan Online atau Ambil di Tempat</h5>
                    <p class="card-text">Kami mengutamakan kenyamanan pelanggan dengan menyediakan layanan pemesanan online
                        yang mudah dan cepat. Pesan hidangan favorit Anda melalui platform online kami, dan nikmati
                        kenyamanan pengambilan di tempat. Dengan ini, Anda dapat menikmati kuliner istimewa N'Jajan tanpa
                        harus menunggu lama atau keluar dari zona kenyamanan Anda.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
