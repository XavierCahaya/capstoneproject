<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
=======

    {{-- Bootstrap Style --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
>>>>>>> 591479acd6ae8c9c9067a887f9266a088bcc721a

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- My Style --}}
<<<<<<< HEAD
    <link rel="stylesheet" href="/css/style.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-F4zO2T+H7t2L8ZG3bYnjNcFJxC+u6bACx4EzZc4KwTn+3RsQZ3gP2bKJvFE9JDFU1qSHJcxTihyDgFq24r7eQ=="
  crossorigin="anonymous" />



    <title>N'Jajan</title>

</head>

<body>
=======
    <link rel="stylesheet" href="{{ asset('css/navstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>N'Jajan</title>
    <body>
>>>>>>> 591479acd6ae8c9c9067a887f9266a088bcc721a

      @include('partials/navbar')

      <div class="container mt-4">
          @yield('container')
      </div>

      @include('partials/footer')


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
