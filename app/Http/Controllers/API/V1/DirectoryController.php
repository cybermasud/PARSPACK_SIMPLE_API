<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DirectoryController extends Controller
{

    public function createDir()
    {
        $path = 'c:\xampp\htdocs/' . Auth::user()->name;
        if (is_dir($path)) {
            return response()->json(['message' => 'Directory Exists']);
        }
        mkdir($path);
        return response()->json(['message' => 'Directory Created']);
    }

    public function createFile()
    {
        $path = 'C:\Users\Masood\Desktop/' . Auth::user()->name;
        if (is_file($path)) {
            return response()->json(['message' => 'File Exists']);
        }
        fopen($path, 'a');
        return response()->json(['message' => 'File Created']);
    }

    public function dirList()
    {

    }

}
