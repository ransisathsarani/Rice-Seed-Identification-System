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

<form id="form" action="{{ route('seed-images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" accept="image/*" class="form-control" placeholder="image" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="button" class="btn btn-info" onclick="submitForm(this)">
                Submit
            </button>
            <span class="spinner-border spinner-border-sm text-info d-none" role="status" aria-hidden="true"></span>
        </div>
    </div>

</form>
@endsection

<script>
    function submitForm(button) {
        button.disabled = true; // Disable the button
        button.innerHTML = 'Loading...'; // Change the button text to 'Loading...'
        $(button).next('.spinner-border').removeClass('d-none'); // Show the spinner
        $(button).closest('form').submit(); // Submit the form
    }
</script>