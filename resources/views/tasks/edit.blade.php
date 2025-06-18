<!-- filepath: resources/views/tasks/create.blade.php -->
@extends('layouts.main_layout')

@section('content')

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('assets/img/hero-bg5.png') }}" alt="" data-aos="fade-in">

            <div class="container-fluid  align-items-center justify-content-center flex-column">

                <h1 data-aos="fade-up" data-aos-delay="100">EDITE SUA TAREFA</h1>

                <!-- Services 2 Section -->
                <section id="services-2" class="services-2 section  bg-transparent">



                    <div class="container">

                        <div class="row gy-4">

                            <div data-aos="fade-up" data-aos-delay="200">
                                <div class="service-item col-md-6">

                                        <form action="{{ route('updateTask', ['id' => Crypt::encrypt($task->id)]) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Título</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    autofocus value="{{$task->title}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Descrição</label>
                                                <textarea class="form-control" id="description" name="description" rows="3">{{$task->description}}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="due_date" class="form-label">Data de Vencimento</label>
                                                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="priority" class="form-label">Prioridade</label>
                                                <select class="form-select" id="priority" name="priority">
                                                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Baixa</option>
                                                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Média</option>
                                                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>Alta</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success w-100">Salvar Tarefa</button>
                                        </form>
                                </div>
                            </div><!-- End Service Item -->



                        </div>

                    </div>

                </section><!-- /Services 2 Section -->
            </div>
        </section>

@endsection
