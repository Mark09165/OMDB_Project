<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('query'); // ← CAMBIO IMPORTANTE
        $movies = [];

        if ($search) {
            $response = Http::get(env('OMDB_API_URL'), [
                'apikey' => env('OMDB_API_KEY'),
                's' => $search
            ]);

            $data = $response->json();

            if (isset($data['Search'])) {
                $movies = $data['Search'];
            }
        }

        return view('index', compact('movies', 'search'));
    }

    public function details($imdbID)
    {
        $response = Http::get(env('OMDB_API_URL'), [
            'apikey' => env('OMDB_API_KEY'),
            'i' => $imdbID
        ]);

        $movie = $response->json();

        return view('details', compact('movie'));
    }
}