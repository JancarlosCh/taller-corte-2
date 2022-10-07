@extends('theme.base')

@section('nav')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">La escuelita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login.show') }}">Entrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="home-background">
        <div class="glass">
            <h1 class="display-1 text-center fw-bold pt-5">Bienvenido <br> a <br> la escuelita</h1>
            <a href="{{ route('signup.index') }}"
                class="display-4 d-block text-center text-dark text-decoration-none animate-charcter">
                <span class="link-shadow">¡</span>Registrate<span class="link-shadow">!</span>
            </a>
        </div>
    </div>
@endsection
