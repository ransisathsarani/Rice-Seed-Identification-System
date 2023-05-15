@extends('seed-images.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Upload an Image</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="http://127.0.0.1:8000/"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('seed-images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="submit-btn" type="submit" class="btn btn-info"> Submit</button>
        </div>
    </div>

</form>
@endsection

<script type="text/javascript">
    $(document).ready(function() {
        // Add a click event listener to the button
        $('#submit-btn').on('click', function() {
            // Add the spinner class to the button
            $(this).addClass('fa fa-spinner fa-spin');
            // Perform the form submission or other action here
        });

    });
</script>