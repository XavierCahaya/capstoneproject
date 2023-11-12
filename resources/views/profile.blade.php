<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <style>
    body {
      margin: 0;
      display: flex;
      flex-direction: column;
      min-height: 152vh;
    }

    nav {
      background-color: #FC3E24;
      padding: 10px;
      text-align: center;
      font-family: 'Poppins', sans-serif;
    }

    nav a {
      color: #000000;
      text-decoration: none;
      font-weight: 700;
      margin: 0 54px;
      font-size: 20px;
      position: relative;
      font-family: 'Poppins', sans-serif;
    }

    nav a:hover {
      color: #ececf1;
    }

    nav a.active {
      color: #000000;
    }

    .card {
    background-color: #D9D9D9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 15px auto;
    padding: 5px;
    height: auto;
    width: 194.4vh;
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
      font-size: 14px;
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

    footer {
      background-color: #FC3E24;
      padding: 10px;
      width: auto;
      height: 108px;
      margin-top: auto;
      display: grid;
      grid-template-areas:"image aside header header"
                          "image aside footer dev"
                          "image aside footer dev";
      grid-template-columns: 200px 280px 650px 200px;
      grid-template-rows: 40px 40px 1px;
    }

    .image {
    grid-area: image;
    }

    
    .image img{
    grid-area: image;
    height: auto;
    width: 100px;
    margin-left: 50px;
    margin-top: 5px;
    }

    .aside {
    grid-area: aside;
    margin-top: 5px;
    }

    .aside img {
    height: auto;
    width: 120px;
    }

    .aside p {
    color: #FFFFFF; 
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    }
    .header {
    grid-area: header;
    margin-top: 15px;
    margin-left: 212px;
    color: #FFFFFB;
    display: flex;
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
    }

    .waig{
    grid-area: footer;
    display: flex;
    margin-left: 170px;
    }

    .waig img {
    width: 35px;
    height: auto;
    margin-top: 10px;
    margin-left: 45px;
    } 

    .dev {
    grid-area: dev;
    margin-top: 60px;
    margin-left: 115px;
    font-size: 10px;
    color: #FFFFFF;
    font-family: 'Poppins', sans-serif;
    background-color: #010102;
    }
  </style>

<title>Profil</title>
</head>
<body>

<nav>
  <a href="#" class="active"><span>Profil</span></a>
  <a href="#"><span>Menu</span></a>
  <a href="#"><span>Kategori</span></a>
  <a href="#"><span>Cek Pesanan</span></a>
  <a href="#"><span>Admin</span></a>
</nav>

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

<div class="buttonpesan">
  <div class="vector1"></div>
    <p class="teks">Pesan Sekarang</p>
  <div class="vector2"></div>
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

<footer>
  <div class="image"><img src={{asset('image/logo.png')}}>
  </div>
  <div class="aside">
  <img src={{asset('image/NJajan.png')}}>
  <p>Jl. Kenanga Gg.3 No.122,Glenmor,</p>
      <p>Banyuwangi, Jawa Timur 68131</p>
  </div>

  <div class="header">Contact Us :</div>
  <div class="waig">
    <p><a href="https://wa.me/628987823044" target="_blank"><img src={{asset('image/wa.png')}}></a></p>
    <p><a href="https://instagram.com/toreh.njajan?igshid=MWh4NXd6azAzOWN0cQ=="><img src={{asset('image/instagram.png')}}></a></p>
  </div>
  </div>

  <div class="dev">
  &copy; 2023 DevTeam
  </div>
</footer>
</body>
</html>
