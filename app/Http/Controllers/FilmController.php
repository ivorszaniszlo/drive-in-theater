<?php

namespace App\Http\Controllers;

use App\Models\Film;
// use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Drive-in Theater API",
 *     version="1.0.0"
 * )
 */
class FilmController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/films",
     *     summary="List all films",
     *     @OA\Response(
     *         response=200,
     *         description="A list of films"
     *     )
     * )
     */
    public function index()
    {
        $films = Film::all();
        return response()->json($films, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/films/{id}",
     *     summary="Get a specific film",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of the film",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Film details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Film not found"
     *     )
     * )
     */
    public function show($id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }
        return response()->json($film, 200);
    }

    // Create a new film
    /*
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
    */

    // Update a film
    /*
    public function update(Request $request, $id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        $film->update($request->all());
        return response()->json($film, 200);
    }
    */

    // Delete a film
    /*
    public function destroy($id)
    {
        $film = Film::find($id);
        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        $film->delete();
        return response()->json(['message' => 'Film deleted successfully'], 200);
    }
    */
}
