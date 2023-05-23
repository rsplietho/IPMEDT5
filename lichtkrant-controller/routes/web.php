<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\WeatherController;


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

Route::get('/', [DataController::class, 'index'])->middleware('auth')->name('index');
Route::post('/updateText', [DataController::class, 'updateText'])->middleware('auth');
Route::post('/updateColour', [DataController::class, 'updateColour'])->middleware('auth');
Route::post('/saveCurrentDataToTextPresets', [DataController::class, 'saveCurrentDataToTextPresets'])->middleware('auth');
Route::post('/update-current/{id}', [DataController::class, 'updateCurrent'])->name('updateCurrent')->middleware('auth');
Route::post('/setmode', [ModeController::class, 'setMode'])->name('setMode')->middleware('auth');

Route::get('/get_text', [DataController::class, 'getText']);
Route::get('/get_colour', [DataController::class, 'getColour']);

Route::get('/user', function(){return view('user');})->middleware('auth')->name('user');

Route::get('/user/edit/name', [UserController::class, 'resetName'])->middleware('auth')->name('user.edit.name');
Route::post('/user/edit/name/submit', [UserController::class, 'storeName'])->middleware('auth')->name('editName');

Route::get('/user/edit/username', [UserController::class, 'resetUserName'])->middleware('auth')->name('user.edit.username');
Route::post('/user/edit/username/submit', [UserController::class, 'storeUserName'])->middleware('auth')->name('editUserName');

Route::get('/user/edit/email', [UserController::class, 'resetEmail'])->middleware('auth')->name('user.edit.email');
Route::post('/user/edit/email/submit', [UserController::class, 'storeEmail'])->middleware('auth')->name('editEmail');

Route::get('/user/edit/password', [UserController::class, 'resetPassword'])->middleware('auth')->name('user.edit.password');
Route::post('/user/edit/password/submit', [UserController::class, 'storePassword'])->middleware('auth')->name('editPassword');

Route::post('/weather', [WeatherController::class, 'store']);

require __DIR__.'/auth.php';

