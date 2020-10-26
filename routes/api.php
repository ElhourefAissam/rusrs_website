<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticaleController;
use App\Http\Controllers\API\EventController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource( 'Article', ArticaleController::class);
Route::apiResource( 'Event', EventController::class);
