<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Mail\SeriesCreated;
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

Route::post('series/{serie}/edit', [SeasonsController::class, 'update'])->name('seasons.update');

Route::post('series/{serie}/seasons/destroy', [SeasonsController::class, 'destroy'])->name('seasons.destroy');

Route::get('register', [UsersController::class, 'create'])
->name('register');

Route::post('register', [UsersController::class, 'store']);

Route::get('login', [LoginController::class, 'index'])
->name('login');

Route::post('login', [LoginController::class, 'store']);

Route::get('/series/search', [SeriesController::class, 'search'])->name('series.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/series/{series}/seasons/{season}/episodes', [SeasonsController::class, 'getEpisodes']);

Route::get('/email', function() {
    return new SeriesCreated(
        'Série de teste',
        1,
        5,
        10,
    );
});

require __DIR__ . '/auth.php';
