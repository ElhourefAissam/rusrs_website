<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\HomeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'user', 'namespace' => 'api'], function () {
    // Login
    Route::post('login', [HomeController::class, 'login'])->name('login');

    //logout
    Route::post('logout', [HomeController::class, 'logout'])->name('logout');

    // Send Reset Password Request
    Route::post('sendresetpassword', 'MemberController@sendresetpassword')->name('user_sendresetpassword');

    // Reset Password
    Route::post('resetpassword', 'MemberController@resetpassword')->name('user_resetpassword');

    // Verify E-mail
    Route::post('verifyemail', 'MemberController@verifyemail')->name('user_verify_email');
});

Route::get('/Article/{q?}',[ArticleController::class,'index']);
Route::get('/Event/{q?}',[EventController::class,'index']);
Route::get('/Member/{q?}',[MemberController::class,'index']);
Route::get('/Program/{q?}',[ProgramController::class,'index']);

/// ghawad ayt7kmn gh image ulpoader controller
Route::apiResource('/imageUpload', 'API\ImageController');


// ->middleware('auth')
Route::resource('Article', 'API\ArticleController');
Route::resource('Event', 'API\EventController');
Route::resource('Member', 'API\MemberController');
Route::resource('Program', 'API\ProgramController');
Route::resource('Image', 'API\ImageController');

Route::group(['middleware' => ['auth']], function () {
    //
});
