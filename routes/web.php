<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonController;//追記

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Book用の一括ルーティング
Route::resource('people', PersonController::class);
  
//   Route::resource('/photos', 'App\Http\Controllers\PhotoController')->only(['create','store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/photo/upload', PersonController::class, 'uploadForm')->name('photo.upload.form');

Route::post('/photo/upload', PersonController::class, 'upload')->name('photo.upload');


// Route::get('/photo/upload', PhotoController::class, 'uploadForm')->name('photo.upload.form');

// Route::post('/photo/upload', PhotoController::class, 'upload')->name('photo.upload');






require __DIR__.'/auth.php';
