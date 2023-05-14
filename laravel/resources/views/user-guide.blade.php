@extends('seed-images.layout')

@section('content')
<div class="row">
    <div class="col-sm">
        <h3>How to use Rice Seed Variety Identification Tool?</h2><br>
        <p>Welcome to the user guide of the rice seed identification system! This system is designed to help you identify different types of rice seeds based on their physical characteristics. Here are the steps to use the system:</p>
        <form action="/action_page.php">
            <p>Steps:</p>
            <div class="custom-file mb-3">
                <ol>
                    <li>Upload an image of the rice seed you want to identify.</li>
                    <li>Wait for the web tool to analyze the image and identify the rice seed.</li>
                    <li>Review the information provided by the web tool.</li>
                </ol>
            </div>
        </form>
    </div>
</div>
@endsection