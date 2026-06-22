@extends('layouts.app')

@section('content')
<h2>Nuevo Equipo</h2>
<form action="{{ route('equipos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}">
        @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Categoría</label>
        <input type="text" name="categoria" class="form-control" value="{{ old('categoria') }}">
    </div>
    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" class="form-control" value="{{ old('marca') }}">
    </div>
    <div class="mb-3">
        <label>Estado</label>
        <select name="estado" class="form-select">
            <option value="Disponible">Disponible</option>
            <option value="Prestado">Prestado</option>
            <option value="Mantenimiento">Mantenimiento</option>
        </select>
    </div>
    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection