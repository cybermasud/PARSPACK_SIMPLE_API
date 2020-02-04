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
Route::get('', function () {
    return response()->json(['available routes' => [['post: api/login' => ['keys' => 'email, password']],
        ['post: api/register' => ['keys' => 'name, email, password, c_password']],
        ['get: api/logout' => ['header' => 'authorization: Bearer token']],
        ['get: api/processes' => ['header' => 'authorization: Bearer token']],
        ['get: api/folder' => ['header' => 'authorization: Bearer token']],
        ['get: api/file' => ['header' => 'authorization: Bearer token']],
        ['post: api/folder/create' => ['header' => 'authorization: Bearer token']],
        ['post: api/file/create' => ['header' => 'authorization: Bearer token']]
    ]]);
});
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('processes', function () {
        $message = [];
        exec('ps -eo pid', $pid);
        exec('ps -eo comm', $comm);
        foreach ($pid as $key => $item) {
            $message[$key] = '{'.'"pid:"' . "$item" . ',' . '"process:"' . "$comm[$key]".'}';
        }
        return response()->json($message);
    });
    Route::get('folder', [DirectoryController::class, 'folderList']);
    Route::get('file', [DirectoryController::class, 'fileList']);
    Route::post('folder/create', [DirectoryController::class, 'createFolder']);
    Route::post('file/create', [DirectoryController::class, 'createFile']);
});
