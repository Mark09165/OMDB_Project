<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>OMDB App</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex flex-column justify-content-center align-items-center vh-100">

    <h1 class="mb-4 text-center">Proyecto OMDB - Laravel</h1>

    <p class="mb-5 text-center text-muted">
        Busca películas, guarda tus favoritas y administra tus reseñas
    </p>

    @if (Route::has('login'))
        <div class="d-flex gap-3">
            @auth
                <a href="{{ route('movies.index') }}" class="btn btn-primary btn-lg">
                    Ir a buscar películas
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-success btn-lg">
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                    Registrarse
                </a>
            @endauth
        </div>
    @endif

</div>

</body>
</html>