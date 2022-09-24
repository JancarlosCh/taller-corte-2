@extends('theme.base')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <h1 class="text-center mt-5">Módulo de gestión de profesores</h1>
            <a href="{{ route('teacher.create') }}" class="btn btn-primary my-4 px-4">Nuevo Profesor</a>

    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible mt-2 mb-4">
            {{ Session::get('mensaje') }}
        </div>
    @endif
        </div>
        <div class="container-fluid table-responsive">
            <table class="table table-striped text-center">
                <caption>Listado de profesores</caption>
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Salario</th>
                        <th>Acciones</th>
                    </tr>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->lastname }}</td>
                            <td>{{ $teacher->dni }}</td>
                            <td>{{ $teacher->address }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->salary }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('teacher.edit', $teacher) }}" class="btn btn-warning px-3 me-1">Editar</a>
                                    <form action="{{ route('teacher.destroy', $teacher) }}" method="POST" class="d-inline">
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
            @if (isset($teachers))
                {{ $teachers->links() }}
            @endif
        </div>
    </div>
@endsection
