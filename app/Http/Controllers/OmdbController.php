<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OmdbController extends Controller
{
    // --- BÚSQUEDA ---
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return view('movies.index', ['movies' => []]);
        }

        $response = Http::get('https://www.omdbapi.com/', [
            'apikey' => env('OMDB_API_KEY'),
            's' => $query,
        ]);

        $data = $response->json();

        $movies = $data['Search'] ?? [];

        return view('movies.index', compact('movies'));
    }

    // --- DETALLES ---
    public function details($imdbID)
    {
        $response = Http::get('https://www.omdbapi.com/', [
            'apikey' => env('OMDB_API_KEY'),
            'i' => $imdbID,
            'plot' => 'full'
        ]);

        $movie = $response->json();

        return view('details', compact('movie'));
    }
}