<!DOCTYPE html>
<html>
<head>
    <title>Mis Favoritos</title>
</head>
<body>

<h1>Películas Favoritas</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
    @foreach($favorites as $fav)
        <div style="border: 1px solid #ccc; padding: 10px; text-align:center;">
            <img src="{{ $fav->poster }}" width="150"><br>
            <strong>{{ $fav->title }}</strong><br><br>

            <a href="{{ route('favorite.edit', $fav->id) }}">Editar nota</a>
            <br><br>

            <form method="POST" action="{{ route('favorite.delete', $fav->id) }}">
                @csrf
                @method('DELETE')
                <button>Eliminar</button>
            </form>
        </div>
    @endforeach
</div>

</body>
</html>