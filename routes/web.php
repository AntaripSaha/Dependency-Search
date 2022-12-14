<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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

Route::get('home', [SearchController::class, 'index'])->name('home');

Route::get('/country', [SearchController::class, 'country']);
Route::get('/state/{id}', [SearchController::class, 'getStates']);
Route::get('/city/{id}', [SearchController::class, 'getCities']);
Route::get('/village/{id}', [SearchController::class, 'getVillage']);