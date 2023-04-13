<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('Omni - Dashboard');

Route::get('/', function () {
    return view('index');
});

Route::get('/', [\App\Http\Controllers\DataController::class, 'index']);


Route::get('/get_text', [DataController::class, 'showCurrentData']);

require __DIR__.'/auth.php';

