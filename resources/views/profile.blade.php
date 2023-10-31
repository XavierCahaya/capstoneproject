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
      min-height: 100vh;
    }

    .card {
    background-color: #D9D9D9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    padding: 5px;
    height: 300px;
    width: 1000px;
    font-family: 'Poppins', sans-serif;
    display: grid;
    grid-template-columns: 400px 600px;
    }

    .right{
      margin-top: 120px;
      margin-left: 380px;
      font-size: 13px;
      color: #FFFFFF;
      font-family: 'Poppins', sans-serif;
    }

    .rightcard h1{
    margin-right: 400px;
    margin-bottom: 30px;
    margin-top: 50px;
    font-size: 20px;
    }

    .rightcard p{
    margin-right: 10px;
    font-weight: 700;
    text-align: justify;
    }

    .leftcard img{
    width: 250px;
    height: auto;
    margin-left: 80px;
    margin-top: 30px;
    border-radius: 50%; /* Membuat gambar berbentuk lingkaran */ 
    }

    nav {
      background-color: #ffffff;
      padding: 7px;
      text-align: center;
      border-bottom: 6px solid #EE883E;
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
    
    footer {
      background-color: #FC3E24;
      padding: 10px;
      width: 1346px;
      height: 145px;
      margin-top: auto;
      display: flex;
      grid-template-columns: 100px 100px 100px;
      grid-template-rows: 100px;
    }
    
    .left {
      color: #FFFFFF;

    }

    .left h2 {
    color: #FFFFFF; 
    font-size: 30px;
    font-family: 'Poller One';
    }

    .left h3 {
    color: #FFFFFF; 
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    }


    .center{
      margin-top: 5px;
      margin-left: 280px;
      color: #FFFFFB;
      display: flex;
      font-family: 'Poppins', sans-serif;
      font-size: 20px;
    }

    .center div {
      width: 50px;
    }

    .center h6 {
    display: flex;
    align-items: center;
    font-size: 15px;
    }

    .center h6 img {
    width: 35px;
    height: auto;
    margin-right: 10px;
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
    <img src={{asset('image/logo.jpg')}}>
  </div>
  <div class="rightcard">
    <h1>Profil Toko</h1>
    <p>Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque. Ut diam quam, semper iaculis condimentum ac, vestibulum eu nisl.</p>
    </div>
</div>

<footer>
  <div class="left">
    <div>
      <h2>N'Jajan</h2>
    </div>
    <h3><p>Jl. Kenanga Gg.3 No.122,Glenmor,</p>
        <p>Banyuwangi, Jawa Timur 68131</p>
    </h3>
  </div>
  <div class="center">
    <h6><a href="https://wa.me/628987823044" target="_blank"><img src={{asset('image/wa.png')}}></a><a href="https://wa.me/628987823044" target="_blank" style="color: #FFFFFF">+628987823044</a></h6>
    <div></div>
    <h6><img src={{asset('image/instagram.png')}}>@N’Jajan</h6>
  </div>
  <div class="right">
  <p>&copy; 2023 DevTeam</p>
  </div>
</footer>
</body>
</html>
