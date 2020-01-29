<?php

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

use App\Http\Controllers\API\V1\DirectoryController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('folder/create',[DirectoryController::class,'createFolder'])->name('folder_create')->middleware('auth');
Route::get('file/create',[DirectoryController::class,'createFile'])->name('file_create')->middleware('auth');
