@extends('layouts.main_layout')

@section('content')
<main class="main">

  <section class="section dark-background d-flex align-items-center justify-content-center" style="min-height: 100vh; background: url('assets/img/hero-bg2.png') center center / cover no-repeat;">
    <div class="container d-flex flex-column align-items-center justify-content-center" style="max-width: 400px;">
      <div class="card shadow-lg rounded-4 p-4 w-100" data-aos="fade-up" data-aos-delay="100" style="background: rgba(30, 34, 45, 0.95); border: none;">
        <div class="text-center mb-4">
          <img src="assets/img/logo6.png" alt="Logo" style="max-width: 150px" class="mb-2">
          <p class="text-secondary">Crie sua conta no MyTask.</p>
        </div>
        <form method="POST" action="{{ route('postRegister') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label text-white">E-mail</label>
            <input type="text" class="form-control rounded-3" id="email" name="email"  autofocus>
          </div>
          @error('email')
            <div class="alert alert-danger" role="alert">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
            <div class="mb-3">
                <label for="name" class="form-label text-white">Nome</label>
                <input type="text" class="form-control rounded-3" id="name" name="name" >
          </div>
           @error('name')
            <div class="alert alert-danger" role="alert">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
          <div class="mb-3">
            <label for="password" class="form-label text-white">Senha</label>
            <input type="password" class="form-control rounded-3" id="password" name="password" >
          </div>
           @error('password')
            <div class="alert alert-danger" role="alert">
              <strong>{{ $message }}</strong>
            </div>
          @enderror

          <button type="submit" class="btn btn-success w-100 py-2">Registrar</button>
        </form>

        <div class="mt-3 text-center">
          <p class="text-secondary">Já tem uma conta? <a href="{{ route('login') }}" class="text-white">Entrar</a></p>
        </div>
      </div>
    </div>
  </section>

</main>

 @endsection

