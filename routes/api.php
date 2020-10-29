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

Route::resource('Article', 'API\ArticleController')->middleware('auth');
Route::resource('Event', 'API\EventController')->middleware('auth');
Route::resource('Member', 'API\MemberController')->middleware('auth');
Route::resource('Program', 'API\ProgramController')->middleware('auth');
Route::resource('Image', 'API\ImageController')->middleware('auth');


Route::group(['middleware' => ['auth']], function () {
    //
});
