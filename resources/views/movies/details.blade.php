@extends('layouts.app')

@section('title', $movie['Title'])

@section('content')

<h2>{{ $movie['Title'] }}</h2>

<img src="{{ $movie['Poster'] }}" width="300">

<p><strong>Año:</strong> {{ $movie['Year'] }}</p>
<p><strong>Duración:</strong> {{ $movie['Runtime'] }}</p>
<p><strong>Género:</strong> {{ $movie['Genre'] }}</p>
<p><strong>Director:</strong> {{ $movie['Director'] }}</p>
<p><strong>Actores:</strong> {{ $movie['Actors'] }}</p>
<p><strong>Sinopsis:</strong> {{ $movie['Plot'] }}</p>

<hr>

<h3>Agregar a favoritos</h3>

@include('partials.favorite_form')

@endsection