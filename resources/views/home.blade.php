@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Profile -->
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <profile-component></profile-component>
        </div>
    </div>
    <!-- Profile End -->
    <!-- Profile -->
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <processes-component></processes-component>
        </div>
    </div>
    <!-- Profile End -->
</div>
@endsection
