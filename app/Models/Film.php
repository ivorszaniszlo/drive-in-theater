<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Screening;

/**
 * @OA\Schema(
 *     schema="Film",
 *     type="object",
 *     title="Film",
 *     description="A model representing a film",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The ID of the film"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="The title of the film"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="The description of the film"
 *     ),
 *     @OA\Property(
 *         property="rating",
 *         type="string",
 *         description="The rating of the film"
 *     ),
 *     @OA\Property(
 *         property="language",
 *         type="string",
 *         description="The language of the film"
 *     ),
 *     @OA\Property(
 *         property="cover_image",
 *         type="string",
 *         description="The cover image of the film"
 *     ),
 *     @OA\Property(
 *         property="screenings",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Screening"),
 *         description="List of screenings for the film"
 *     )
 * )
 */
class Film extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     property="title",
     *     type="string",
     *     description="The title of the film"
     * )
     * @OA\Property(
     *     property="description",
     *     type="string",
     *     description="The description of the film"
     * )
     * @OA\Property(
     *     property="rating",
     *     type="string",
     *     description="The rating of the film"
     * )
     * @OA\Property(
     *     property="language",
     *     type="string",
     *     description="The language of the film"
     * )
     * @OA\Property(
     *     property="cover_image",
     *     type="string",
     *     description="The cover image of the film"
     * )
     */
    protected $fillable = [
        'title',
        'description',
        'rating',
        'language',
        'cover_image',
    ];

    /**
     * @OA\Property(
     *     property="screenings",
     *     description="List of screenings for the film",
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/Screening")
     * )
     */
    public function screenings()
    {
        return $this->hasMany(Screening::class);
    }
}