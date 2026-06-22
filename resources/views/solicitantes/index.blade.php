@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Solicitantes</h2>
    <a href="{{ route('solicitantes.create') }}" class="btn btn-primary">+ Nuevo Solicitante</a>
</div>

<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o documento..." value="{{ request('buscar') }}">
        <button class="btn btn-outline-secondary">Buscar</button>
    </div>
</form>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr><th>Nombre</th><th>Documento</th><th>Correo</th><th>Tipo</th><th>Acciones</th></tr>
    </thead>
    <tbody>
        @foreach($solicitantes as $s)
        <tr>
            <td>{{ $s->nombre }}</td>
            <td>{{ $s->documento }}</td>
            <td>{{ $s->correo }}</td>
            <td><span class="badge bg-info text-dark">{{ $s->tipo }}</span></td>
            <td>
                <a href="{{ route('solicitantes.edit', $s) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('solicitantes.destroy', $s) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection