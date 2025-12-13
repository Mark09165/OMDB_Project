<?php

use Illuminate\Foundation\Inspiring;
use App\Http\Controllers\OmdbController;

Route::get('/search', [OmdbController::class, 'search']);
