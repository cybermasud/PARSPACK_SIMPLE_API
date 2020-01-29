<?php

use App\Http\Controllers\API\V1\DirectoryController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('processes',function (){
        exec('ps aux',$message);
        return response()->json(['message'=> $message]);
    });
    Route::get('folder',[DirectoryController::class,'folderList']);
    Route::get('file',[DirectoryController::class,'fileList']);
    Route::get('folder/create',[DirectoryController::class,'createFolder']);
    Route::get('file/create',[DirectoryController::class,'createFile']);
});
