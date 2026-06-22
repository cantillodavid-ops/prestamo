@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Préstamos</h2>
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary">+ Nuevo Préstamo</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Equipo</th><th>Solicitante</th><th>F. Préstamo</th>
            <th>F. Esperada</th><th>F. Devolución</th><th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prestamos as $p)
        <tr>
            <td>{{ $p->equipo->nombre }}</td>
            <td>{{ $p->solicitante->nombre }}</td>
            <td>{{ $p->fecha_prestamo }}</td>
            <td>{{ $p->fecha_devolucion_esperada }}</td>
            <td>
                @if($p->fecha_devolucion_real)
                    <span class="badge bg-success">{{ $p->fecha_devolucion_real }}</span>
                @else
                    <span class="badge bg-danger">Pendiente</span>
                @endif
            </td>
            <td>
                @if(!$p->fecha_devolucion_real)
                <form action="{{ route('prestamos.devolucion', $p) }}" method="POST">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-success" onclick="return confirm('¿Registrar devolución?')">
                        Devolver
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection