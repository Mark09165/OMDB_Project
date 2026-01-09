<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 rounded">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('movies.index') }}">OMDB App</a>

        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('movies.index') }}">Buscar</a>
            <a class="nav-link" href="{{ route('favorites.index') }}">Favoritos</a>
        </div>
    </div>
</nav>
