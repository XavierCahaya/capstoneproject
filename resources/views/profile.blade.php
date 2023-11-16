<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    {{-- My Style --}}
    <link rel="stylesheet" href="/css/navstyle.css">
    
    <title>N'Jajan</title>

    <style>

    body {
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 152vh;
    }

    .card {
    background-color: #D9D9D9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 15px auto;
    padding: 5px;
    height: auto;
    width: 194.5vh;
    font-family: 'Poppins', sans-serif;
    display: grid;
    grid-template-columns: 400px 900px;
    }


    .leftcard img{
    width: 250px;
    height: auto;
    margin-left: 80px;
    margin-top: 10px;
    margin-bottom: 5px;
    }

    .rightcard h1{
    margin-right: 400px;
    margin-bottom: 10px;
    margin-top: 50px;
    font-size: 20px;
    }

    .rightcard p{
    margin-right: 10px;
    font-weight: 700;
    text-align: justify;
    }

    .buttonpesan{
    background-color: #FC3E24;
    border-radius: 15px;
    margin: 50px auto;
    padding: 5px;
    height: 70px;
    width: 50%;
    align-items: center;
    display: grid;
    grid-template-areas:"vector1 teks vector2";
    grid-template-columns: 1fr 4fr 1fr;
    grid-template-rows: 70px;
    }

    .vector1{
      grid-area: vector1;
      width: 100px;
      border: 7px solid #ffffff;
    }
    .vector2{
      grid-area: vector2;
      width: 100px;
      border: 7px solid #ffffff;
    }

    .teks{
      grid-area: teks;
      font-size: 30px;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      color: #FFFFFF;
      text-align: center;
    }

    .tigabox {
      display: grid;
      grid-template-areas:"leftC centerC rightC";
      grid-template-columns: 280px 280px 280px;
      grid-template-rows: 280px;
      margin-top: auto;
      margin-left: auto;
      margin-right: auto;
      grid-gap: 40px;
    }

    .tigabox h3 {
      font-size: 13px;
      font-family: 'Poppins', sans-serif;
      font-weight: 900;
      text-align: center;
    }

    .tigabox p {
      font-size: 12.7px;
      text-align: justify;
      font-family:'Poppins', sans-serif; 
    }

    .leftC {
      grid-area: leftC;
      background-color: #D9D9D9;
      border-radius: 15px;
      padding: 10px;
      width: auto;
      height: 250px;
      
    }
    .centerC {
      grid-area: centerC;
      background-color: #D9D9D9;
      border-radius: 15px;
      padding: 10px;
      width: auto;
      height: 250px;
    }

    .rightC  {
      grid-area: rightC;
      background-color: #D9D9D9;
      border-radius: 15px;
      padding: 10px;
      width: auto;
      height: 250px;
    }
    </style>  
  </head>

  <body>

    @include('partials/navbar')

    <div class="card">
      <div class="leftcard">
        <img src={{asset('image/logo.png')}}>
      </div>
      <div class="rightcard">
        <h1>Hallo N'Jajaners!</h1>
        <p>Selamat datang di N'Jajan, tempatnya untuk menikmati kelezatan aneka olahan mi dan es! Jelajahi menu kami yang kaya akan pilihan, mulai dari mie spesial hingga es segar yang memikat lidah Anda. 
          Nikmati kemudahan dalam menelusuri menu, memesan secara online di website kami, dan mengambil pesanan langsung di lokasi kami. 
          N'Jajan menghadirkan pengalaman makanan yang lezat dan praktis untuk memenuhi nafsu makan Anda. Selamat menikmati sajian istimewa dari N'Jajan!</p>
        </div>
    </div>
    
    <div class="tigabox">
    <div class="leftC">
      <h3>Inovasi Rasa yang Menggoda</h3>
      <p>N'Jajan membanggakan diri dengan inovasi rasa yang tak tertandingi dalam setiap hidangan mi dan es kami. 
        Dari kombinasi bumbu mi yang unik hingga paduan es yang lezat, setiap sajian di N'Jajan diciptakan untuk memanjakan lidah Anda dengan sensasi rasa yang baru dan tak terlupakan.</p>
    </div>
    <div class="centerC">
      <h3>Pilihan Menu Beragam</h3>
      <p>Temukan ragam pilihan mi dan es yang memikat hati Anda. 
        Dari mi khas N'Jajan hingga es segar dengan aneka rasa, kami menyajikan menu yang beragam untuk memenuhi selera semua pelanggan. 
        Pilihan yang luas ini memastikan bahwa setiap kunjungan Anda ke N'Jajan adalah petualangan kuliner yang berbeda setiap kali.</p>
    </div>
    <div class="rightC">
      <h3>Pesan Online atau Ambil di Tempat</h3>
      <p>Kami mengutamakan kenyamanan pelanggan dengan menyediakan layanan pemesanan online yang mudah dan cepat. Pesan hidangan favorit Anda melalui platform online kami, dan nikmati kenyamanan pengambilan di tempat. 
        Dengan ini, Anda dapat menikmati kuliner istimewa N'Jajan tanpa harus menunggu lama atau keluar dari zona kenyamanan Anda.
      </p>
    </div>
    </div>
    
    @include('partials/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

