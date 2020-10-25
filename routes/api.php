<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticaleController;
use App\Http\Controllers\API\EventController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('Article', ArticaleController::class);
Route::apiResource('Event', EventController::class);
<<<<<<< HEAD

=======
>>>>>>> d33e299f018e45373343bd37f9f375a03fcfc245


