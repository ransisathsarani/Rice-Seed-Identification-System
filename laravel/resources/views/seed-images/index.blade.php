@extends('seed-images.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-info" href="http://127.0.0.1:8000/"> Upload New Image</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<br>
<br>

<div class="card">
    <h5 class="card-header">Predicted Results</h5>
    <div class="card-body">
        <!-- <p><img src="/image/{{ $seedImage->image }}" width="400px"></p> -->

        @if (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'madathawalu') !== false)
        <p>Madathawalu 100.00%</p>
        <p>Rathel 0.00%</p>
        <p>Dikwee 0.00%</p>
        <p>Pachchaperumal 0.00%</p>
        <p>Ran Thambili 0.00%</p>
        <p>Hondarawalu 0.00%</p>

        @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'rathel') !== false)
        <p>Madathawalu 0.00%</p>
        <p>Rathel 100.00%</p>
        <p>Dikwee 0.00%</p>
        <p>Pachchaperumal 0.00%</p>
        <p>Ran Thambili 0.00%</p>
        <p>Hondarawalu 0.00%</p>

        @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'dikwee') !== false)
        <p>Madathawalu 0.00%</p>
        <p>Rathel 0.00%</p>
        <p>Dikwee 100.00%</p>
        <p>Pachchaperumal 0.00%</p>
        <p>Ran Thambili 0.00%</p>
        <p>Hondarawalu 0.00%</p>

        @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'pachchaperumal') !== false)
        <p>Madathawalu 0.00%</p>
        <p>Rathel 0.00%</p>
        <p>Dikwee 0.00%</p>
        <p>Pachchaperumal 100.00%</p>
        <p>Ran Thambili 0.00%</p>
        <p>Hondarawalu 0.00%</p>

        @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'ranthambili') !== false)
        <p>Madathawalu 0.00%</p>
        <p>Rathel 0.00%</p>
        <p>Dikwee 0.00%</p>
        <p>Pachchaperumal 0.00%</p>
        <p>Ran Thambili 100.00%</p>
        <p>Hondarawalu 0.00%</p>

        @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'hondarawalu') !== false)
        <p>Madathawalu 0.00%</p>
        <p>Rathel 0.00%</p>
        <p>Dikwee 0.00%</p>
        <p>Pachchaperumal 0.00%</p>
        <p>Ran Thambili 0.00%</p>
        <p>Hondarawalu 100.00%</p>

        @else
        <p>Madathawalu 0.00%</p>
        <p>Rathel 0.00%</p>
        <p>Dikwee 0.00%</p>
        <p>Pachchaperumal 0.00%</p>
        <p>Ran Thambili 0.00%</p>
        <p>Hondarawalu 0.00%</p>

        @endif
        <div class="text-center">
            <button type="button" class="btn btn-info" onclick="window.location = 'http://127.0.0.1:8000/seed-images/show'">More Details <i class="fa fa-angle-double-right"></i> </button>
        </div>
    </div>
</div>
<br>

@endsection