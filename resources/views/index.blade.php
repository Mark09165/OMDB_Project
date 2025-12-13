<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de Películas</title>
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
    </style>
</head>
<body>

    <h1>Buscar Películas</h1>

    <form action="{{ route('movies.index') }}" method="GET">
        <input type="text" name="query" placeholder="Buscar..." value="{{ $search ?? '' }}" required>
        <button type="submit">Buscar</button>
    </form>

    @if(isset($movies))
        <h2>Resultados:</h2>

        @if(count($movies) === 0)
            <p>No se encontraron resultados.</p>
        @else
            <div class="grid">
                @foreach($movies as $m)
                    <div class="item">
                        <img src="{{ $m['Poster'] ?? '' }}" alt="Poster">
                        <h3>{{ $m['Title'] ?? 'Sin título' }}</h3>
                        <p>{{ $m['Year'] ?? '' }}</p>

                        <a href="{{ route('movies.details', $m['imdbID']) }}">
                            Ver detalles
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    @endif

</body>
</html>
