<?php

use App\Http\Controllers\Api\SeriesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Mail\SeriesCreated;
use App\Models\Series;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [UsersController::class, 'create'])
->name('register');

Route::post('register', [UsersController::class, 'store']);

Route::get('login', [LoginController::class, 'index'])
->name('login');

Route::post('login', [LoginController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/email', function() {
    return new SeriesCreated(
        'Série de teste',
        1,
        5,
        10,
    );
});

require __DIR__ . '/auth.php';
