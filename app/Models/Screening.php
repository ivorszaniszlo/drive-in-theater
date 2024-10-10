<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;

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
     */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
