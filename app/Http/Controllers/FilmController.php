<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // List all films
    public function index()
    {
        $films = Film::all();
        return response()->json($films, 200);
    }

    // Get a specific film
    public function show($id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }
        return response()->json($film, 200);
    }

    // Create a new film
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|string',
            'language' => 'required|string',
            'cover_image' => 'required|string',
        ]);

        $film = Film::create($request->all());
        return response()->json($film, 201);
    }

    // Update a film
    public function update(Request $request, $id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        $film->update($request->all());
        return response()->json($film, 200);
    }

    // Delete a film
    public function destroy($id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        $film->delete();
        return response()->json(['message' => 'Film deleted successfully'], 200);
    }
}
