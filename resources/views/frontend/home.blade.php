@extends('layouts.app')

@section('content')
    @forelse($news as $new)
        <!-- Blog Post -->
        <div class="card mb-4">
            <div class="slider-container">
                @foreach (json_decode($new->photos) as $key => $photo)
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
            <div class="card-body">
            <h2 class="card-title">{{ $new->title }}</h2>
            <p class="card-text">{!! $new->subject !!}</p>
            <a href="#" class="btn btn-primary">قراءة المزيد &rarr;</a>
            </div>
            <div class="card-footer text-muted">
            تم النشر في {{ $new->created_at->diffForHumans() }}
            </div>
        </div>
    @empty

    @endforelse
        {{ $news->links() }}
@endsection
