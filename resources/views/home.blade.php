@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <a href="{{route('folder_create')}}"><button>Create Folder</button></a>
        <a href="{{route('file_create')}}"><button>Create File</button></a>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <processes-component></processes-component>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <folders-component></folders-component>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <files-component></files-component>
        </div>
    </div>
</div>
@endsection
