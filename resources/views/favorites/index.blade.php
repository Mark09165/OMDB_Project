@extends('layouts.app')

@section('content')

<h1>Mis Favoritos</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
@forelse($favorites as $fav)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <img src="{{ $fav->poster }}" class="card-img-top">
            <div class="card-body">
                <h5>{{ $fav->title }}</h5>

                <a href="{{ route('movies.details', $fav->imdbID) }}" class="btn btn-sm btn-outline-primary">
                    Ver detalles
                </a>

                <a href="{{ route('favorites.edit', $fav->id) }}" class="btn btn-sm btn-outline-warning">
                    Editar nota
                </a>

                <form action="{{ route('favorites.destroy', $fav->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <p>No tienes películas favoritas aún.</p>
@endforelse
</div>

@endsection