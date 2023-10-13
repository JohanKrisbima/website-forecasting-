<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="{{ asset('../assets/img/apple-icon.png') }}"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login - Forecasting Website</title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!-- Fonts and icons -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"
      rel="stylesheet"
    />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <!-- CSS Files -->
    <link href="{{ asset('../assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('../assets/demo/demo.css') }}" rel="stylesheet" />
    <style>
      body {
        background-image: url("../assets/img/bg_login.jpg");
        background-size: cover; /* Menyusuaikan gambar sesuai ukuran layar */
        background-repeat: no-repeat; /* Mencegah gambar diulang */
        background-attachment: fixed; /* Membuat gambar tetap terlihat saat scrolling */
        background-color: #fff; /* Warna latar belakang cadangan jika gambar tidak tampil */
      }

      .login-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .login-logo {
        margin-bottom: 30px;
      }

      .login-logo img {
        width: 150px; /* Sesuaikan dengan ukuran logo Anda */
      }

      .login-form {
        background-color: #ffffff75;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }

      .login-form input[type="text"],
      .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }

      .password-input {
        position: relative;
      }

      .password-input input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }

      .password-input .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
      }

      .login-form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
      }
    </style>
  </head>
 
  <body class="">
   
    <div class="login-container">
      @if(session()->has('loginError'))
      <script>alert('Login Gagal')</script>
      @endif
      <div class="login-form">
        <h2>Login to Forecasting Website</h2>
        <form action="/login" method="POST">
          @csrf
          <input type="text" name="name" placeholder="Username" required />
          <div class="password-input">
            <input
              type="password"
              name="password"
              placeholder="Password"
              required
            />
            <span
              class="password-toggle"
              onclick="togglePasswordVisibility(this)"
            >
              <i class="fa fa-eye" id="password-icon"></i>
            </span>
          </div>
          <button type="submit">Login</button>
        </form>
      </div>
    </div>
    <!-- Core JS Files -->
    <script src="{{ asset('../assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script
      src="{{ asset('../assets/js/paper-dashboard.min.js?v=2.0.1') }}"
      type="text/javascript"
    ></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('../assets/demo/demo.js') }}"></script>
    <script>
      function togglePasswordVisibility(icon) {
        var passwordField = document.querySelector('input[name="password"]');
        if (passwordField.type === "password") {
          passwordField.type = "text";
          icon.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
          passwordField.type = "password";
          icon.innerHTML = '<i class="fa fa-eye"></i>';
        }
      }
    </script>
  </body>
</html>
