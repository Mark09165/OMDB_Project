<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    // Mostrar todos los favoritos
    public function index()
    {
        $favorites = Favorite::all();
        return view('favorites.index', compact('favorites'));
    }

    // Guardar película en favoritos
    public function store(Request $request)
    {
        // Evitar duplicados
        $exists = Favorite::where('imdbID', $request->imdbID)->first();

        if ($exists) {
            return redirect()->route('favorites.index')
                ->with('info', 'La película ya está en favoritos');
        }

        Favorite::create([
            'imdbID' => $request->imdbID,
            'title' => $request->title,
            'poster' => $request->poster,
            'note' => $request->note
        ]);

        return redirect()->route('favorites.index')
            ->with('success', 'Película agregada a favoritos');
    }

    // Eliminar favorito
    public function destroy($id)
    {
        Favorite::destroy($id);

        return redirect()->route('favorites.index')
            ->with('success', 'Película eliminada');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $favorite = Favorite::findOrFail($id);
        return view('favorites.edit', compact('favorite'));
    }

    // Actualizar nota
    public function update(Request $request, $id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->update([
            'note' => $request->note
        ]);

        return redirect()->route('favorites.index')
            ->with('success', 'Reseña actualizada');
    }
}