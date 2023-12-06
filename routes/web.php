<?php

use App\Http\Controllers\obtenerCuotasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/obtenerCuotas', [obtenerCuotasController::class, 'index'])->name('obtenerCuotas');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
