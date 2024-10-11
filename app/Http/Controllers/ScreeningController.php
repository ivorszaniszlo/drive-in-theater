<?php

namespace App\Http\Controllers;

use App\Models\Screening;
// use Illuminate\Http\Request;
// use Illuminate\Http\Response;

class ScreeningController extends Controller
{
    /**
     * List all screenings
     *
     * @OA\Get(
     *     path="/api/screenings",
     *     operationId="getScreeningsList",
     *     tags={"Screenings"},
     *     summary="Get list of screenings",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Screening"))
     *     )
     * )
     */
    public function index()
    {
        $screenings = Screening::with('film')->get();
        return response()->json($screenings, 200);
    }

    /**
     * Get a specific screening
     *
     * @OA\Get(
     *     path="/api/screenings/{id}",
     *     operationId="getScreeningById",
     *     tags={"Screenings"},
     *     summary="Get a specific screening",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Screening")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Screening not found"
     *     )
     * )
     */
    public function show($id)
    {
        $screening = Screening::with('film')->find($id);
        if (!$screening) {
            return response()->json(['message' => 'Screening not found'], 404);
        }
        return response()->json($screening, 200);
    }

    // Create a new screening
    /*
    public function store(Request $request)
    {
        $request->validate([
            'datetime' => 'required|date',
            'available_seats' => 'required|integer|min:1',
            'film_id' => 'required|exists:films,id',
        ]);

        $screening = Screening::create($request->all());
        return response()->json($screening, 201);
    }
    */

    // Update a screening
    /*
    public function update(Request $request, $id)
    {
        $screening = Screening::find($id);
        if (!$screening) {
            return response()->json(['message' => 'Screening not found'], 404);
        }

        $screening->update($request->all());
        return response()->json($screening, 200);
    }
    */

    // Delete a screening
    /*
    public function destroy($id)
    {
        $screening = Screening::find($id);
        if (!$screening) {
            return response()->json(['message' => 'Screening not found'], 404);
        }

        $screening->delete();
        return response()->json(['message' => 'Screening deleted successfully'], 200);
    }
    */
}
