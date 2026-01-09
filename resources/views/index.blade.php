@extends('layouts.app')

@section('content')

<h1 class="mb-4">Buscar Películas</h1>

<form action="{{ route('movies.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Buscar..." value="{{ $search ?? '' }}">
        <button class="btn btn-primary">Buscar</button>
    </div>
</form>

@if(!empty($movies))
    <div class="row">
        @foreach($movies as $m)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $m['Poster'] }}" class="card-img-top" alt="Poster">
                    <div class="card-body">
                        <h5 class="card-title">{{ $m['Title'] }}</h5>
                        <p>{{ $m['Year'] }}</p>
                        <a href="{{ route('movies.details', $m['imdbID']) }}" class="btn btn-sm btn-outline-primary">
                            Ver detalles
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection