<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use \App\Http\Controllers\UserController;


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
Route::post('//saveCurrentDataToTextPresets', [DataController::class, 'saveCurrentDataToTextPresets'])->middleware('auth');
Route::post('/update-current/{id}', [DataController::class, 'updateCurrent'])->name('updateCurrent')->middleware('auth');

Route::get('/', function () {
    return view('index');
});

Route::get('/', [\App\Http\Controllers\DataController::class, 'index']);


Route::get('/get_text', [DataController::class, 'showCurrentData']);

Route::get('/user', function(){return view('user');})->middleware('auth')->name('user');
Route::get('/user/edit/name', [UserController::class, 'resetName'])->middleware('auth')->name('user.edit.name');
Route::get('/user/edit/username', [UserController::class, 'resetUserName'])->middleware('auth')->name('user.edit.username');
Route::get('/user/edit/email', [UserController::class, 'resetEmail'])->middleware('auth')->name('user.edit.email');
Route::get('/user/edit/password', [UserController::class, 'resetPassword'])->middleware('auth')->name('user.edit.password');


require __DIR__.'/auth.php';

