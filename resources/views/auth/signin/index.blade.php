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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <form action="{{ route('login.perform') }}" method="POST" class="col-sm-9 col-md-9 col-lg-9 col-xl-6">
                @csrf
                            <h1 class="text-center mt-5">Iniciar Sesión</h1>
        @if (Session::has('mensaje'))
            <div class="alert alert-danger alert-dismissible mt-2 mb-2">
                {{ Session::get('mensaje') }}
            </div>
        @endif
            @if (Session::has('registered'))
            <div class="alert alert-success alert-dismissible mt-2 mb-2">
                {{ Session::get('registered') }}
            </div>
        @endif
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control">
                @error('email')
                    <p class="form-text text-danger mb-0 p-0">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                @error('email')
                    <p class="form-text text-danger mb-0 p-0">{{ $message }}</p>
                @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ route('signup.index') }}">Registrarse</a>
                </div>
            </form>
        </div>
    </div>
@endsection
