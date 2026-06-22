@extends('layouts.app')

@section('content')
<h2>Editar Equipo</h2>
<form action="{{ route('equipos.update', $equipo) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $equipo->codigo) }}">
        @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $equipo->nombre) }}">
    </div>
    <div class="mb-3">
        <label>Categoría</label>
        <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $equipo->categoria) }}">
    </div>
    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" class="form-control" value="{{ old('marca', $equipo->marca) }}">
    </div>
    <div class="mb-3">
        <label>Estado</label>
        <select name="estado" class="form-select">
            @foreach(['Disponible', 'Prestado', 'Mantenimiento'] as $estado)
                <option value="{{ $estado }}" {{ $equipo->estado == $estado ? 'selected' : '' }}>{{ $estado }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection