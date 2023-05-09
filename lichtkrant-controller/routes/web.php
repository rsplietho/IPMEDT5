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

Route::get('/', [\App\Http\Controllers\DataController::class, 'index'])->middleware('auth');;
Route::post('/updateText', [\App\Http\Controllers\DataController::class, 'updateText'])->middleware('auth');;
Route::post('/updateColour', [\App\Http\Controllers\DataController::class, 'updateColour'])->middleware('auth');;
Route::post('//saveCurrentDataToTextPresets', [\App\Http\Controllers\DataController::class, 'saveCurrentDataToTextPresets'])->middleware('auth');;
Route::post('/update-current/{id}', [DataController::class, 'updateCurrent'])->name('updateCurrent')->middleware('auth');;

Route::get('/get_text', [DataController::class, 'getText']);
Route::get('/get_colour', [DataController::class, 'getColour']);

require __DIR__.'/auth.php';

