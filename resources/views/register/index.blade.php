<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    

<link href="assets/css/register.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>

    
    {{-- <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet"> --}}
  </head>


  <body class="text-center">
    
<main class="form-registration w-100 m-auto">
  <form action="/register" method="POST">
    @csrf
    {{-- <img class="mb-4" src="img/logo/logo.PNG" alt="" width="72" height="57"> --}}
    <i class="bi bi-bootstrap" width="72" height="57"></i>
    <h1 class="h3 mb-3 fw-normal">Please Registrasi</h1>

    <div class="form-floating">
      <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
      <label for="name">Name</label>
      @error('name')
      <div class="invalid-feedback">
       {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" required value="{{ old('email') }}">
      <label for="email">Email Address</label>
      @error('email')
      <div class="invalid-feedback">
       {{ $message }}
      </div>
      @enderror
    </div>
    {{-- <div class="form-floating">
      <input type="text" name="telpon" class="form-control @error('telpon') is-invalid @enderror" id="telpon" placeholder="No.telp" required value="{{ old('telpon') }}">
      <label for="telpon">No.telp</label>
      @error('telpon')
      <div class="invalid-feedback">
       {{ $message }}
      </div>
      @enderror
    </div> --}}
    <div class="form-floating">
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
      <label for="password">Password</label>
      @error('password')
      <div class="invalid-feedback">
       {{ $message }}
      </div>
      @enderror
    </div>
    {{-- <div class="form-floating">
      <input type="password" name="password_confirmed" class="form-control @error('password_confirmed') is-invalid @enderror" id="password_confirmed" placeholder="password_confirmed" required>
      <label for="password_confirmed">Konfirmasi Password</label>
      @error('password_confirmed')
      <div class="invalid-feedback">
       {{ $message }}
      </div>
      @enderror
    </div> --}}
    <button class="w-100 btn btn-lg btn-primary mt-3 mb-2" type="submit">Register</button>
    <small>Sudah mempunyai akun? <a href="/login">Login Now</a></small>
    <p class="mt-5 mb-3 text-body-secondary">&copy; PovShot</p>
  </form>

</main>


    
  </body>
</html>
