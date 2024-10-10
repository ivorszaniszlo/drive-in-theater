<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ScreeningController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', fn() => to_route('films.index'));

Route::apiResource('films', FilmController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

Route::apiResource('screenings', ScreeningController::class)->only(['index', 'show', 'store', 'update', 'destroy']);