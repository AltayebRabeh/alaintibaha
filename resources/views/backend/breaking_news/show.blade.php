@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="card col-md-12">
            <div class="slider-container">
                @foreach (json_decode($news->photos) as $key => $photo)
                    <div class="mySlides">
                        <img src="{{ url($photo ) }}" style="height:300px; max-width:100%" class="d-block ml-auto">
                    </div>
                @endforeach

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                
                {{-- <div class="row">
                    @foreach (json_decode($news->photos) as $key => $photo)
                        <div class="column">
                            <img class="demo cursor" src="{{ url($photo ) }}" style="width:100%" onclick="currentSlide({{ $key+1 }})" alt="">
                        </div>
                    @endforeach
                </div> --}}
            </div>
            <div class="card-body text-right">
                <h5 class="card-title">{{ $news->title }}</h5>
                <p class="card-text">{!! $news->subject !!}</p>
            </div>
        </div>
    </div>
@endsection
