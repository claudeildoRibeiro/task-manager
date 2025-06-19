@extends('layouts.main_layout')

@section('content')
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/hero-bg5.png" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center text-center" data-aos="fade-up" data-aos-delay="100">
        <h3 data-aos="fade-up" data-aos-delay="100" class="text-warning">MYTASKS  O Seu Gestor de Tarefas</h3>
        <p data-aos="fade-up" data-aos-delay="200" class="text-center">Organize suas tarefas de forma eficiente e prática com MyTasks! Com um layout intuitivo para otimizar sua produtividade. Crie sua conta e transforme sua rotina com facilidade!</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">CRIE SUA CONTA</a>
          {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span>
        </a> --}}
        </div>
      </div>

    </section><!-- /Hero Section -->

  </main>
@endsection
