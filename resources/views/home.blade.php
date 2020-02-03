@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Folder</div>
                    <div class="card-body">
                        <div>
                            <form method="POST" action="{{route('folder_create')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="folder" class="col-md-4 col-form-label text-md-right">Folder
                                        Name</label>

                                    <div class="col-md-6">
                                        <input id="folder" type="text"
                                               class="form-control @error('folder') is-invalid @enderror" name="folder"
                                               required
                                               autofocus>

                                        @error('folder')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create Folder
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create File</div>
                    <div class="card-body">
                        <div>
                            <form method="POST" action="{{route('file_create')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">File
                                        Name</label>

                                    <div class="col-md-6">
                                        <input id="file" type="text"
                                               class="form-control @error('file') is-invalid @enderror" name="file"
                                               required
                                               autofocus>

                                        @error('file')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create File
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
