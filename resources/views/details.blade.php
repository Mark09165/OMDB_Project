<!DOCTYPE html>
<html>
<head>
    <title>{{ $movie['Title'] }}</title>
</head>
<body>

<h1>{{ $movie['Title'] }}</h1>
<img src="{{ $movie['Poster'] }}" width="200">

<p><strong>Año:</strong> {{ $movie['Year'] }}</p>
<p><strong>Duración:</strong> {{ $movie['Runtime'] }}</p>
<p><strong>Género:</strong> {{ $movie['Genre'] }}</p>
<p><strong>Director:</strong> {{ $movie['Director'] }}</p>
<p><strong>Actores:</strong> {{ $movie['Actors'] }}</p>
<p><strong>Sinopsis:</strong> {{ $movie['Plot'] }}</p>

<hr>

<h2>Agregar a favoritos</h2>

<form action="{{ route('favorites.store') }}" method="POST">
    @csrf
    <input type="hidden" name="imdbID" value="{{ $movie['imdbID'] }}">
    <input type="hidden" name="title" value="{{ $movie['Title'] }}">
    <input type="hidden" name="poster" value="{{ $movie['Poster'] }}">
    <label>Nota / Reseña (opcional):</label><br>
    <textarea name="note" rows="4" cols="40"></textarea>
    <br><br>
    <button type="submit">Guardar en favoritos</button>
</form>

<br>
<a href="/movies">← Volver</a>

</body>
</html>