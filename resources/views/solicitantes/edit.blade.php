@extends('layouts.app')

@section('content')
<h2>Editar Solicitante</h2>
<form action="{{ route('solicitantes.update', $solicitante) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $solicitante->nombre) }}">
    </div>
    <div class="mb-3">
        <label>Documento</label>
        <input type="text" name="documento" class="form-control @error('documento') is-invalid @enderror" value="{{ old('documento', $solicitante->documento) }}">
        @error('documento') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $solicitante->correo) }}">
        @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Tipo</label>
        <select name="tipo" class="form-select">
            @foreach(['Estudiante', 'Docente'] as $tipo)
                <option value="{{ $tipo }}" {{ $solicitante->tipo == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection