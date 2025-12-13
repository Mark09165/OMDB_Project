<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Películas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
        }
        .card {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #fafafa;
        }
        img {
            border-radius: 8px;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .search-box input {
            padding: 8px;
            width: 250px;
        }
        .search-box button {
            padding: 8px 12px;
        }
    </style>
</head>
<body>

    <h1>Buscador de Películas</h1>

    {{-- Buscador --}}
    <form action="{{ route('movies.search') }}" method="GET" class="search-box">
        <input type="text" name="query" placeholder="Busca una película..." value="{{ $query ?? '' }}">
        <button type="submit">Buscar</button>
    </form>

    {{-- Si hubo resultados --}}
    @if(isset($movies) && count($movies) > 0)
        <div class="grid">
            @foreach ($movies as $movie)
                <div class="card">

                    {{-- Poster --}}
                    <img src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : 'https://via.placeholder.com/300x450?text=Sin+Poster' }}"
                         width="150">

                    {{-- Título --}}
                    <h4>{{ $movie['Title'] }}</h4>

                    {{-- Botón de detalles --}}
                    <a href="{{ route('movie.details', $movie['imdbID']) }}">
                        Ver detalles
                    </a>

                </div>
            @endforeach
        </div>

    @elseif(isset($movies))
        <p>No se encontraron películas con ese título.</p>
    @endif

</body>
</html>