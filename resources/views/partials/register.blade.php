<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home - MyTask - o seu gestor de tarefas</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body class="index-page">
<main class="main">

  <section class="section dark-background d-flex align-items-center justify-content-center" style="min-height: 100vh; background: url('assets/img/hero-bg2.png') center center / cover no-repeat;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="max-width: 400px;">
      <div class="card shadow-lg rounded-4 p-4 w-100"  data-aos-delay="100" style="background: rgba(30, 34, 45, 0.95); border: none;">
        <div class="text-center mb-4">
          <img src="assets/img/logo6 .png" alt="Logo" style="max-width: 170px;" class="mb-2">
          <p class="text-secondary">Crie sua conta no MyTask.</p>
        </div>
        <form method="POST" action="{{ route('postRegister') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label text-white">E-mail</label>
            <input type="email" class="form-control rounded-3" id="email" name="email" required autofocus>
          </div>
            <div class="mb-3">
                <label for="name" class="form-label text-white">Nome</label>
                <input type="text" class="form-control rounded-3" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-white">Senha</label>
            <input type="password" class="form-control rounded-3" id="password" name="password" required>
          </div>

          <button type="submit" class="btn btn-get-started w-100 py-2">Registrar</button>
        </form>

        <div class="mt-3 text-center">
          <p class="text-secondary">Já tem uma conta? <a href="{{ route('login') }}" class="text-white">Entrar</a></p>
      </div>
    </div>
  </section>

</main>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

