@extends('seed-images.layout')

@section('content')
<div class="text-center">
    <button type="button" class="home_btn btn-info btn-lg btn-block" onclick="window.location = 'http://127.0.0.1:8000/seed-images/create'"><i class="fa fa-upload"></i> Upload an Image</button>
    <br>
    <br>
    <button type="button" class="home_btn btn-info btn-lg btn-block" href="#"><i class="fa fa-camera"></i> Capture an Image</button>
</div>
@endsection