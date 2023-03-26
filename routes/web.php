<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonController;//追記
use App\Http\Controllers\PhotoController;//追記
use App\Http\Controllers\TemperatureController;
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


Route::get('/photos/create', [PhotoController::class, 'uploadForm'])->name('photos.create.form');
Route::post('/photos/create', [PhotoController::class, 'upload'])->name('photos.create');
// postはこちら側が情報を投げる　getは情報をとってくる



// Route::resource('people/{id}/edit', TemperatureController::class);
// Route::post('people/{id}/edit', [TemperatureController::class, 'post'])->name('temperature.post');
// Route::resource('temperature', TemperatureController::class);
// Route::post('people/'.$person->id.'/edit', [TemperatureController::class,'post'])->name('temperature.post');
Route::post('people/{id}/edit', [TemperatureController::class,'store'])->name('temperature.post');


Route::get('people/{id}/edit', [PersonController::class, 'edit'])->name('people.edit');
// Route::post('people', [TemperatureController::class,'post'])->name('temperature.post');
// Route::post('people/{id}/edit', 'TemperatureController@post')->name('temperature.post');
// Route::get('people/{id}/edit', [TemperatureController::class, 'edit'])->name('people.edit');
// Route::post('peopleedit', [TemperatureController::class, 'store'])->name('peopleedit.create');

// Route::get('/photo/upload', PhotoController::class, 'uploadForm')->name('photo.upload.form');

// Route::post('/photo/upload', PhotoController::class, 'upload')->name('photo.upload');



Route::get('businesscard', 'BusinessCardController@index');
Route::post('businesscard/extract', 'BusinessCardController@extract');


require __DIR__.'/auth.php';
