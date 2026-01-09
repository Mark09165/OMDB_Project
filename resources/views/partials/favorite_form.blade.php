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