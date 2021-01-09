@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="card col-md-12" style="width: 18rem;">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach (json_decode($comments->news->photos) as $key => $photo)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class=" @if($key == 0) active @endif"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" style="height:300px">
                    @foreach (json_decode($comments->news->photos) as $key => $photo)
                        <div class="carousel-item @if($key == 0) active @endif" data-interval="10000">
                            <img src="{{ url($photo ) }}" class="d-block w-20" style="height:300px" alt="...">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">السابق</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">التالي</span>
                </a>
            </div>
            <div class="card-body text-right">
                <h5 class="card-title">{{ $comments->news->title }}</h5>
                <p class="card-text">{!! $comments->news->subject !!}</p>
                <p class="card-text comment">{!! $comments->comment !!}</p>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card-text.comment {
            background-color: #ddd;
            color: #333;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: relative;
        }

        .card-text.comment:before {
            content: '';
            border: 15px solid;
            position: absolute;
            border-color: transparent transparent #ddd;
            top: -30px;
            right: 20px;
        }
    </style>
@endsection
