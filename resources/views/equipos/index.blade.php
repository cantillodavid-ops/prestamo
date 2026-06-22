@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Equipos</h2>
    <a href="{{ route('equipos.create') }}" class="btn btn-primary">+ Nuevo Equipo</a>
</div>

<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o código..." value="{{ request('buscar') }}">
        <button class="btn btn-outline-secondary">Buscar</button>
    </div>
</form>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Código</th><th>Nombre</th><th>Categoría</th><th>Marca</th><th>Estado</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>{{ $equipo->codigo }}</td>
            <td>{{ $equipo->nombre }}</td>
            <td>{{ $equipo->categoria }}</td>
            <td>{{ $equipo->marca }}</td>
            <td>
                <span class="badge 
                    {{ $equipo->estado == 'Disponible' ? 'bg-success' : ($equipo->estado == 'Prestado' ? 'bg-warning' : 'bg-secondary') }}">
                    {{ $equipo->estado }}
                </span>
            </td>
            <td>
                <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection