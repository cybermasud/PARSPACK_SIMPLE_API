<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\CreateFolderRequest;
use Illuminate\Support\Facades\Auth;

class DirectoryController extends Controller
{

    public function createFolder(CreateFolderRequest $request)
    {
        $path = '/opt/myprogram/' . $request->input('folder');
        if (is_dir($path)) {
            return response()->json(['message' => 'Directory Exists']);
        }
        mkdir($path);
        return response()->json(['message' => 'Directory Created']);
    }

    public function createFile(CreateFileRequest $request)
    {
        $path = '/opt/myprogram/' . $request->input('name') . '.txt';
        if (is_file($path)) {
            return response()->json(['message' => 'File Exists']);
        }
        fopen($path, 'a');
        return response()->json(['message' => 'File Created']);
    }

    public function folderList()
    {
        exec('ls /opt/myprogram/ -F | grep \/$', $message);
        return response()->json(['message' => $message]);
    }

    public function fileList()
    {
        exec('ls /opt/myprogram/ -p | grep -v /', $message);
        return response()->json(['message' => $message]);
    }

}
