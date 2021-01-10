@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="card col-md-12" style="">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach (json_decode($news->photos) as $key => $photo)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class=" @if($key == 0) active @endif"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" style="height:300px">
                    @foreach (json_decode($news->photos) as $key => $photo)
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
                <h5 class="card-title">{{ $news->title }}</h5>
                <p class="card-text">{!! $news->subject !!}</p>
                <div class="text-center" style="color:#4e73df">
                    <div class="like ml-1" style="float: left;width: 40px;height: 40px;">
                        <i class="fas fa-car fa-2x d-block"></i>
                        <span>{{ $like }}</span>
                    </div>
                    <div class="dislike" style="float: left;width: 40px;height: 40px;">
                        <i class="fas fa-car fa-2x d-block"></i>
                        <span>{{ $like }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
