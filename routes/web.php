<?php

use App\Http\Controllers\Admin\CharacterController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\Character;
use App\Models\Comic;
use App\Models\Film;
use App\Models\Serie;
use Illuminate\Support\Facades\Route;

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
    $characters = Character::all();
    $comics = Comic::all();
    $films = Film::all();
    $series = Serie::all();
    return view('welcome',compact('comics','characters','films','series'));
});

Route::middleware('auth', 'verified')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/profilo', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('comics', ComicController::class);
});

Route::get('/comics', [ComicController::class,'index'])->name('comics.index');
Route::get('/comics/{comic}', [ComicController::class,'show'])->name('comics.show');

Route::get('/characters', [CharacterController::class,'index'])->name('characters.index');
Route::get('/characters/{character}', [CharacterController::class,'show'])->name('characters.show');

Route::middleware('auth')
->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
