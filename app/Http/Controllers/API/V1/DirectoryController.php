<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DirectoryController extends Controller
{

    public function createFolder()
    {
        $path = '/opt/myprogram/' . Auth::user()->name;
        if (is_dir($path)) {
            return response()->json(['message' => 'Directory Exists']);
        }
        mkdir($path);
        return response()->json(['message' => 'Directory Created']);
    }

    public function createFile()
    {
        $path = '/opt/myprogram/' . Auth::user()->name . '.txt';
        if (is_file($path)) {
            return response()->json(['message' => 'File Exists']);
        }
        fopen($path, 'a');
        return response()->json(['message' => 'File Created']);
    }

    public function folderList()
    {
        exec('ls -F | grep \/$', $message);
        return response()->json(['message' => $message]);
    }

    public function fileList()
    {
        exec('ls -p | grep -v /', $message);
        return response()->json(['message' => $message]);
    }

}
