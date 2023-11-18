<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

    {{-- boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- css --}}
    <link rel="stylesheet" href="/css/login.css">

    <title>Login</title>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-3 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-3 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #FC3E24">
                <div class="featured-image mb-2">
                    <img src="/image/logo.png" class="img-fluid" style="width: 250px" alt="logo">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600; ">Be
                    Verified</p>
                <small class="text-white text-wrap text-center mb-1"
                    style="width: 18rem; font-family: 'Courier New', Courier, monospace; font-size: 17px; ">Access
                    needed to view dashboard Admin!</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello, Admin!</h2>
                        <p>We are happy to have you back</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username">
                    </div>
                    <div class="input-group mb-5">
                        <input type="password" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg w-100 fs-6 text-white">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
