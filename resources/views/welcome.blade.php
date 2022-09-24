@extends('theme.base')
@section('content')
    <div class="home-background">
        <div class="glass">
            <h1 class="display-1 text-center fw-bold pt-5">Welcome back <br> to <br> school</h1>
            <a href="{{ route('student.index') }}" class="display-4 d-block text-center text-dark text-decoration-none animate-charcter">
                <span class="link-shadow">>></span> Go to the student module <span class="link-shadow">
                    <<</span>
            </a>
        </div>
    </div>
@endsection
