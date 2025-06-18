{{--  --}}
@extends('layouts.main_layout')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="assets/img/hero-bg5.png" alt="" data-aos="fade-in">

            <div class="container d-flex flex-column align-items-center">

                <h1 data-aos="fade-up" data-aos-delay="100">Bem-vindo ao <span class="text-warning">Task Manager</span></h1>

                <p data-aos="fade-up" data-aos-delay="200">
                    Olá, <small
                        class="text-warning">{{ explode(' ', session('user') ? session('user')->name : session('admin')->name)[0] }}</small>!
                    O que temos pra hoje?
                </p>
                <div class="d-flex my-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('createTask') }}" class="btn-get-started">Nova Tarefa</a>
                    {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span>
        </a> --}}
                </div>
                <!-- Services 2 Section -->
                <section id="services-2" class="services-2 section  bg-transparent">



                    <div class="container">
                        @error('error')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row gy-4">


                            @foreach ($tasks as $task)
                                <div class="col" data-aos="fade-up" data-aos-delay="200">

                                    <div class="service-item d-flex position-relative h-100">
                                        <i class="bi bi-card-checklist icon flex-shrink-0"></i>
                                        <div>
                                            <h4 class="title"><a href="#">{{ $task['title'] }}</a></h4>

                                            <p class="description">{{ $task['description'] }}</p>
                                            <div class="justify-content-between d-flex align-items-center">
                                                {{-- data de vencimento e prioridade --}}
                                                <span class="text-success">Vencimento:</span>
                                                {{-- formatar data --}}
                                                {{-- <span class="text-muted">{{ $task['due_date'] }}</span> --}}
                                                {{-- formatar data --}}
                                                <span
                                                    class="text-success">{{ date('d/m/Y', strtotime($task['due_date'])) }}</span>
                                                <span
                                                    class="badge bg-{{ $task['priority'] == 'high' ? 'danger' : ($task['priority'] == 'medium' ? 'warning' : 'success') }}">
                                                    {{ ucfirst($task['priority']) }}
                                                </span>

                                            </div>
                                            {{-- botao para excluir e editar --}}
                                            <div class="d-flex justify-content-between mt-3">
                                                <a href="{{ route('editTask', ['id' => Crypt::encrypt($task['id'])]) }}"
                                                    class="btn-edit text-warning">Editar</a>
                                                <a href="{{ route('deleteTask', ['id' => Crypt::encrypt($task['id'])]) }}"
                                                    class="btn-delete text-danger">Excluir</a>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- End Service Item -->
                            @endforeach



                        </div>

                    </div>

                </section><!-- /Services 2 Section -->

                <!-- Testimonials Section -->
            </div>




        </section><!-- /Hero Section -->






    </main>
@endsection
