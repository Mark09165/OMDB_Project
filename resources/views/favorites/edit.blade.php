@extends('layouts.app')

@section('content')

<h1>Editar reseña</h1>

<form action="{{ route('favorites.update', $favorite->id) }}" method="POST">
    @csrf
    @method('PUT')

    <textarea name="note" class="form-control mb-3">{{ $favorite->note }}</textarea>

    <button class="btn btn-primary">Guardar cambios</button>
    <a href="{{ route('favorites.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection