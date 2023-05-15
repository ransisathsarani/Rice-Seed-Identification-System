<?php

use App\Http\Controllers\SeedImagesController;
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
    return view('home');
});

Route::get('/user-guide', function () {
    return view('user-guide');
});

Route::resource('seed-images', SeedImagesController::class);


// Route::get('seed-images', [SeedImagesController::class, 'index']);
// Route::get('seed-images/create', [SeedImagesController::class, 'create']);
// Route::post('seed-images/store', [SeedImagesController::class, 'store']);
// Route::get('seed-images/edit/{id}', [SeedImagesController::class, 'edit']);
// Route::post('seed-images/update/{id}', [SeedImagesController::class, 'update']);
// Route::get('seed-images/delete/{id}', [SeedImagesController::class, 'destroy']);
// Route::get('seed-images/results', [SeedImagesController::class, 'showResults']);
