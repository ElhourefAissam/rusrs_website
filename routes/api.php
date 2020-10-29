<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\ProgramController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Article/{q?}',[ArticleController::class,'index']);
Route::get('/Event/{q?}',[EventController::class,'index']);
Route::get('/Member/{q?}',[MemberController::class,'index']);
Route::get('/Program/{q?}',[ProgramController::class,'index']);

Route::resource('Article', 'API\ArticleController');
Route::resource('Event', 'API\EventController');
Route::resource('Member', 'API\MemberController');
Route::resource('Program', 'API\ProgramController');

Route::apiResource('/imageUpload', 'API\ImageController');
