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
Route::post('/updateText', [\App\Http\Controllers\DataController::class, 'updateText']);
Route::post('/updateColour', [\App\Http\Controllers\DataController::class, 'updateColour']);
Route::post('//saveCurrentDataToTextPresets', [\App\Http\Controllers\DataController::class, 'saveCurrentDataToTextPresets']);
Route::post('/update-current/{id}', [DataController::class, 'updateCurrent'])->name('updateCurrent');




Route::get('/get_text', [DataController::class, 'showCurrentData']);

require __DIR__.'/auth.php';

