@extends('layouts.app')

@section('content')
<h2>Nuevo Préstamo</h2>
<form action="{{ route('prestamos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Equipo</label>
        <select name="equipo_id" class="form-select @error('equipo_id') is-invalid @enderror">
            <option value="">-- Seleccionar equipo --</option>
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre }} ({{ $equipo->codigo }})</option>
            @endforeach
        </select>
        @error('equipo_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Solicitante</label>
        <select name="solicitante_id" class="form-select @error('solicitante_id') is-invalid @enderror">
            <option value="">-- Seleccionar solicitante --</option>
            @foreach($solicitantes as $s)
                <option value="{{ $s->id }}">{{ $s->nombre }} ({{ $s->tipo }})</option>
            @endforeach
        </select>
        @error('solicitante_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Fecha de Préstamo</label>
        <input type="date" name="fecha_prestamo" class="form-control @error('fecha_prestamo') is-invalid @enderror" value="{{ old('fecha_prestamo', date('Y-m-d')) }}">
        @error('fecha_prestamo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Fecha Esperada de Devolución</label>
        <input type="date" name="fecha_devolucion_esperada" class="form-control @error('fecha_devolucion_esperada') is-invalid @enderror" value="{{ old('fecha_devolucion_esperada') }}">
        @error('fecha_devolucion_esperada') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
</form>
@endsection