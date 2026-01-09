<div class="item">
    <img src="{{ $poster }}" alt="Poster">
    <h3>{{ $title }}</h3>

    @isset($year)
        <p>{{ $year }}</p>
    @endisset

    @isset($detailsLink)
        <a href="{{ $detailsLink }}">Ver detalles</a>
    @endisset

    @isset($deleteLink)
        <form action="{{ $deleteLink }}" method="POST" style="margin-top:5px;">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    @endisset

    @isset($editLink)
        <a href="{{ $editLink }}">Editar nota</a>
    @endisset
</div>