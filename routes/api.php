<?php

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group( function () {


    Route::apiResource('/series', \App\Http\Controllers\Api\SeriesController::class);

    Route::get('/series/{series}/seasons', function (Series $series) {
        return $series->seasons;
    });
    Route::get('/series/{series}/episodes', function (Series $series) {
        return $series->episodes;
    });
    
    Route::patch('/episodes/{episode}', function (Episode $episode, Request $request) {
        
        $episode->watched = $request->watched;
        $episode->save();
    
        return $episode;
    });

});


    
Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials) === false ) {
        return response()->json('Unauthorized', 401);
    } 

    $user = Auth::user();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);

        //IT COULD BE THIS TOO:
    //$user = User::whereEmail($credentials['email'])->first();
    // if (Hash::check($credentials['password'], $user->password) == false) {
    //     return response()->json('Unauthorized', 401);
    // } else{
    //     return response()->json('Authorized', 200);
    // };
    // }
});


