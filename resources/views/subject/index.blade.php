@extends('theme.base')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <h1 class="text-center mt-5">Módulo de gestión de asignaturas</h1>
            <a href="{{ route('subject.create') }}" class="btn btn-primary my-4 px-4">Nueva Asignatura</a>

    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible mt-2 mb-4">
            {{ Session::get('mensaje') }}
        </div>
    @endif

        </div>
        <div class="container-fluid table-responsive">
            <table class="table table-striped text-center">
                <caption>Listado de asignaturas</caption>
                <thead class="table-dark">
                    <tr>
                        <td>Nombre</td>
                        <td>Aula de clases</td>
                        <td>Horario</td>
                        <td>Profesor</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                    @php
                        $name = $subject->teacher->name;
                        $lastname = $subject->teacher->lastname;

                        $fullname = $name . " " . $lastname;
                    @endphp
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->classroom }}</td>
                            <td>{{ $subject->class_schedule }}</td>
                            <td>{{ $fullname }}</td>
                            <td class="d-flex flex-wrap justify-content-center">
                                <a href="{{ route('subject.show', $subject) }}" class="btn btn-info px-2 me-1">Detalles</a>
                                <a href="{{ route('subject.edit', $subject) }}" class="btn btn-warning px-3 ms-1 me-1">Editar</a>
                                <form action="{{ route('subject.destroy', $subject) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger px-2 ms-1"
                                        onclick="return confirm ('¿Desea borrar el registro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No  hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if (isset($subjects))
                {{ $subjects->links() }}
            @endif
        </div>
    </div>
@endsection
