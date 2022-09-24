@extends('theme.base')

@section('content')
    <div class="container-sm">
        <div class="container-fluid">
            <h1 class="text-center mt-5 mb-0">{{ $subject_name }}</h1>
            <p class="text-center mb-0">{{ $subject_classroom }}</p>
            <p class="text-center">{{ $schedule }}</p>
            <a href="{{ route('classes.create') }}" class="btn btn-primary my-4">Matricular Estudiante</a>
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible mt-2 mb-4">
                {{ Session::get('mensaje') }}
            </div>
        @endif
        </div>
        <div class="container-fluid table-responsive">
            <table class="table table-sm table-striped text-center">
                <caption>Listado de estudiantes matriculados</caption>
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>
                                @php
                                    $data = $subject_id . '|' . $student->id;
                                @endphp
                                <form action="{{ route('classes.destroy', $data) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Desmatricular</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if (isset($students))
                {{ $students->links() }}
            @endif
        </div>
    </div>
@endsection
