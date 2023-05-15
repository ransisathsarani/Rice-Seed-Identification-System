@extends('seed-images.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-info" href="http://127.0.0.1:8000/"> Upload New Image</a>
        </div>
    </div>
</div>
<br>
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
        @if(session('predicted_class'))
        <p>Predicted class: {{ session('predicted_class') }}</p>
        @endif

        <!-- Button trigger modal -->
        <div class="text-center">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                More Details <i class="fa fa-angle-double-right"></i>
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">More Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            @if(session('predicted_class') == 'Dikwee')
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
                            @elseif(session('predicted_class') == 'Madathawalu')
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
                            @elseif(session('predicted_class') == 'Rathel')
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
                            @elseif(session('predicted_class') == 'Pachchaperumal')
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
                            @elseif(session('predicted_class') == 'Ranthambili')
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
                            @elseif(session('predicted_class') == 'Hondarawalu')
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection

<script type="text/javascript">
    $(document).ready(function() {
        $('#exampleModal').modal('show');
    });
</script>