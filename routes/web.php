<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\GatheredUrlController::class, 'index']);

Route::post('/save', [\App\Http\Controllers\GatheredUrlController::class, 'store']);