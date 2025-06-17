@extends('layouts.main_layout')

@section('content')
    <main class="main">

        <section class="section dark-background d-flex align-items-center justify-content-center"
            style="min-height: 100vh; background: url('assets/img/hero-bg2.png') center center / cover no-repeat;">
            <div class="container d-flex flex-column align-items-center justify-content-center" style="max-width: 400px;">
                <div class="card shadow-lg rounded-4 p-4 w-100" data-aos="fade-up" data-aos-delay="100"
                    style="background: rgba(30, 34, 45, 0.95); border: none;">
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}">
                            <img src="assets/img/logo6.png" alt="Logo" style="max-width: 150px;" class="mb-2">
                        </a>

                        <p class="text-secondary">Bem-vindo de volta! Faça login para continuar.</p>
                    </div>
                    <form method="POST" action="{{ route('postLogin') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">E-mail</label>
                            <input type="text" class="form-control rounded-3" id="email" name="email" autofocus
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Senha</label>
                            <input type="password" class="form-control rounded-3" id="password" name="password"
                                value="{{ old('password') }}">
                        </div>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label text-secondary" for="remember">Lembrar-me</label>
                        </div>
                        <button type="submit" class="btn btn-get-started w-100 py-2 bg-success text-white">Entrar</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="#" class="text-secondary">Esqueceu a senha?</a>
                    </div>
                    <div class="mt-3 text-center">
                        <p class="text-secondary">Não tem uma conta? <a href="{{ route('register') }}"
                                class="text-white">Registrar</a></p>
                    </div>
                </div>
        </section>

    </main>
@endsection
