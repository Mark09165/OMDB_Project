@extends('layouts.app')

@section('content')

<h1>{{ $movie['Title'] }}</h1>

<div class="row">
    <div class="col-md-4">
        <img src="{{ $movie['Poster'] }}" class="img-fluid">
    </div>

    <div class="col-md-8">
        <p><strong>Año:</strong> {{ $movie['Year'] }}</p>
        <p><strong>Género:</strong> {{ $movie['Genre'] }}</p>
        <p><strong>Director:</strong> {{ $movie['Director'] }}</p>
        <p><strong>Actores:</strong> {{ $movie['Actors'] }}</p>
        <p><strong>Sinopsis:</strong> {{ $movie['Plot'] }}</p>

        <hr>

        <h5>Agregar a favoritos</h5>

        <form action="{{ route('favorites.store') }}" method="POST">
            @csrf
            <input type="hidden" name="imdbID" value="{{ $movie['imdbID'] }}">
            <input type="hidden" name="title" value="{{ $movie['Title'] }}">
            <input type="hidden" name="poster" value="{{ $movie['Poster'] }}">

            <textarea name="note" class="form-control mb-2" placeholder="Nota (opcional)"></textarea>

            <button class="btn btn-success">Guardar en favoritos</button>
        </form>
    </div>
</div>

@endsection