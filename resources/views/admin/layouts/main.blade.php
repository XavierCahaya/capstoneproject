<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="body">

  <section class="wrapper">
    <header class="header">
      @include('admin/layouts/header')
    </header>
    <section class="main">
      @include('admin/layouts/sidebar')
    </section>
    <section class="content">
      <div class="container mt-4">
        @yield('container')
      </div>
    </section>
  </section>
  
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>