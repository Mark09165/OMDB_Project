<!DOCTYPE html>
<html>
<head>
    <title>Editar nota - {{ $favorite->title }}</title>
</head>
<body>
    <h1>Editar nota de: {{ $favorite->title }}</h1>

    <form action="{{ route('favorites.update', $favorite->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nota / Reseña:</label><br>
        <textarea name="note" rows="4" cols="50">{{ $favorite->note }}</textarea>
        <br><br>

        <button type="submit">Guardar cambios</button>
    </form>

    <br>
    <a href="{{ route('favorites.index') }}">← Volver a favoritos</a>
</body>
</html>