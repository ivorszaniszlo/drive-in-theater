<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Screening",
 *     type="object",
 *     title="Screening",
 *     description="A model representing a screening",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The ID of the screening"
 *     ),
 *     @OA\Property(
 *         property="datetime",
 *         type="string",
 *         format="date-time",
 *         description="The datetime of the screening"
 *     ),
 *     @OA\Property(
 *         property="available_seats",
 *         type="integer",
 *         description="The number of available seats for the screening"
 *     ),
 *     @OA\Property(
 *         property="film_id",
 *         type="integer",
 *         description="The ID of the film associated with the screening"
 *     ),
 *     @OA\Property(
 *         property="film",
 *         ref="#/components/schemas/Film",
 *         description="The film associated with the screening"
 *     )
 * )
 */
class Screening extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datetime',
        'available_seats',
        'film_id',
    ];

    /**
     * Get the film that owns the screening.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
