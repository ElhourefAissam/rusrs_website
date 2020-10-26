<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticaleController;
use App\Http\Controllers\API\EventController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/Article/{q?}', [ArticaleController::class,'index']);
Route::get('/Event/{q?}', [ArticaleController::class,'index']);




Route::resource('Article', ArticaleController::class);
Route::resource('Event', EventController::class);


