<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Screening;

class Film extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'rating',
        'language',
        'cover_image',
    ];

    /**
     * Get the screenings for the film.
     */
    public function screenings()
    {
        return $this->hasMany(Screening::class);
    }
}