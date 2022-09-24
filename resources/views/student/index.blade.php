@extends('theme.base')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <h1 class="text-center mt-5">Módulo de gestión de estudiantes</h1>
            <a href="{{ route('student.create') }}" class="btn btn-primary my-4 px-4">Nuevo Estudiante</a>

    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible mt-2 mb-4">
            {{ Session::get('mensaje') }}
        </div>
    @endif

        </div>
        <div class="container-fluid table-responsive">
            <table class="table table-striped text-center">
                <caption>Listado de estudiantes</caption>
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Nivel</th>
                        <th>Acciones</th>
                    </tr>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>{{ $student->dni }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->level }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('student.edit', $student) }}" class="btn btn-warning px-3 me-1">Editar</a>
                                    <form action="{{ route('student.destroy', $student) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger px-2 ms-1"
                                            onclick="return confirm ('¿Desea borrar el registro?')">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
                </thead>
            </table>
            @if (isset($students))
                {{ $students->links() }}
            @endif
        </div>
    </div>
@endsection
