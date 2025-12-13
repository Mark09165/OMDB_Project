<!DOCTYPE html>
<html>
<head>
    <title>Mis Favoritos</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .item {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        img {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }
        .buttons {
            margin-top: 10px;
        }
        .buttons form {
            display: inline-block;
            margin: 0 5px;
        }
    </style>
</head>
<body>

    <h1>Mis Películas Favoritas</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('info'))
        <p style="color: blue;">{{ session('info') }}</p>
    @endif

    @forelse($favorites as $fav)
        <div class="item">
            <img src="{{ $fav->poster }}" alt="Poster">
            <h3>{{ $fav->title }}</h3>
            <p>{{ $fav->year ?? '' }}</p>

            <a href="{{ route('movies.details', $fav->imdbID) }}">Ver detalles</a>

            <div class="buttons">
                <form action="{{ route('favorites.destroy', $fav->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>

                <a href="{{ route('favorites.edit', $fav->id) }}">Editar nota</a>
            </div>
        </div>
    @empty
        <p>No tienes películas favoritas aún.</p>
    @endforelse

    <br>
    <a href="{{ route('movies.index') }}">← Volver a buscar películas</a>

</body>
</html>