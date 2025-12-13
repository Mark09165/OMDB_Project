@extends('layouts.main')

@section('title', 'Buscar películas')

@section('content')

<h1>Buscar Películas</h1>

<form action="{{ route('movies.index') }}" method="GET" class="mb-4">
    <input type="text" name="query" class="form-control" placeholder="Buscar..." required>
</form>

@if(!empty($movies))
    <div class="row">
        @foreach($movies as $m)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $m['Poster'] }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $m['Title'] }}</h5>
                        <a href="{{ route('movies.details', $m['imdbID']) }}" class="btn btn-primary btn-sm">
                            Ver detalles
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection