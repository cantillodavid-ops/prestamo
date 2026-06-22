@extends('layouts.app')

@section('content')
<h2>Nuevo Solicitante</h2>
<form action="{{ route('solicitantes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Documento</label>
        <input type="text" name="documento" class="form-control @error('documento') is-invalid @enderror" value="{{ old('documento') }}">
        @error('documento') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
        @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Tipo</label>
        <select name="tipo" class="form-select">
            <option value="Estudiante">Estudiante</option>
            <option value="Docente">Docente</option>
        </select>
    </div>
    <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection