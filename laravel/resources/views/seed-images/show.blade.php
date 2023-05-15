@extends('seed-images.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('seed-images.index') }}"> Back</a>
        </div>
    </div>
</div>

<br>
<div class="card">
    @if (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'madathawalu') !== false)
    <h5 class="card-header">Madathawalu</h5>
    <div class="card-body">
        <p><b>Nutrition</b></p>
        <ul>
            <li>High in fiber</li>
            <li>Good source of essential vitamins and minerals, including vitamin B1, B2, and B6, magnesium, and phosphorus</li>
            <li>Low glycemic index</li>
            <li>Contains complex carbohydrates</li>
        </ul>
        <br>
        <p><b>Medical Value</b></p>
        <ul>
            <li>Believed to have anti-inflammatory properties</li>
            <li>May help reduce the risk of chronic diseases, such as heart disease and diabetes, due to its high fiber and complex carbohydrate content</li>
            <li>May help improve digestion and reduce the risk of constipation due to its fiber content</li>
        </ul>
    </div>

    @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'rathel') !== false)
    <h5 class="card-header">Rathel</h5>
    <div class="card-body">
        <p><b>Nutrition</b></p>
        <ul>
            <li>High in fiber</li>
            <li>Good source of essential vitamins and minerals, including vitamin B1, B2, and B6, magnesium, and phosphorus</li>
            <li>Contains complex carbohydrates</li>
        </ul>
        <br>
        <p><b>Medical Value</b></p>
        <ul>
            <li>Believed to have anti-inflammatory properties</li>
            <li>May help reduce the risk of chronic diseases, such as heart disease and diabetes, due to its high fiber and complex carbohydrate content</li>
            <li>May help improve digestion and reduce the risk of constipation due to its fiber content</li>
        </ul>
    </div>

    @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'dikwee') !== false)
    <h5 class="card-header">Dikwee</h5>
    <div class="card-body">
        <p><b>Nutrition</b></p>
        <ul>
            <li>High in fiber</li>
            <li>Good source of essential vitamins and minerals, including vitamin B1, B2, and B6, magnesium, and phosphorus</li>
            <li>Low glycemic index</li>
            <li>Contains high levels of antioxidants</li>
        </ul>
        <br>
        <p><b>Medical Value</b></p>
        <ul>
            <li>Believed to have medicinal properties that can help with digestive issues, inflammation, and skin problems</li>
            <li>Can help regulate blood sugar levels in the body</li>
        </ul>
    </div>

    @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'pachchaperumal') !== false)
    <h5 class="card-header">Pachchaperumal</h5>
    <div class="card-body">
        <p><b>Nutrition</b></p>
        <ul>
            <li>Rich in essential vitamins and minerals, including iron, calcium, magnesium, and zinc</li>
            <li>Good source of dietary fiber</li>
            <li>Contains complex carbohydrates</li>
        </ul>
        <br>
        <p><b>Medical Value</b></p>
        <ul>
            <li>Believed to have anti-inflammatory properties</li>
            <li>May help regulate blood sugar levels due to its low glycemic index</li>
            <li>May help improve digestion and reduce the risk of constipation due to its fiber content</li>
        </ul>
    </div>

    @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'ranthambili') !== false)
    <h5 class="card-header">Ranthambili</h5>
    <div class="card-body">
        <p><b>Nutrition</b></p>
        <ul>
            <li>Rich in essential vitamins and minerals, including iron, calcium, magnesium, and zinc</li>
            <li>Good source of dietary fiber</li>
            <li>Contains complex carbohydrates and protein</li>
        </ul>
        <br>
        <p><b>Medical Value</b></p>
        <ul>
            <li>Believed to have anti-inflammatory properties</li>
            <li>May help reduce the risk of heart disease and stroke due to its antioxidant content</li>
            <li>May help regulate blood sugar levels due to its low glycemic index</li>
            <li>May help improve digestion and reduce the risk of constipation due to its fiber content</li>
        </ul>
    </div>

    @elseif (strpos(pathinfo($seedImage->image, PATHINFO_FILENAME), 'hondarawalu') !== false)
    <h5 class="card-header">Hondarawalu</h5>
    <div class="card-body">
        <p><b>Nutrition</b></p>
        <ul>
            <li>Rich in essential vitamins and minerals, including iron, magnesium, and zinc</li>
            <li>Good source of dietary fiber</li>
            <li>Contains complex carbohydrates and protein</li>
        </ul>
        <br>
        <p><b>Medical Value</b></p>
        <ul>
            <li>Believed to have antioxidant properties that may help protect against diseases such as cancer and heart disease</li>
            <li>May help regulate blood sugar levels due to its low glycemic index</li>
            <li>May help improve digestion and reduce the risk of constipation due to its fiber content</li>
            <li>May help reduce inflammation and promote healthy joints</li>
        </ul>
    </div>

    @else
    <h5 class="card-header">Unable to find any details</h5>
    <div class="card-body">
        <p>No info</p>
    </div>

    @endif



</div>

@endsection