@extends('layouts.app')

@section('content')
    <div class="row">
    @forelse($news as $new)
        <!-- Blog Post -->
        <div class="col-md-4">
            <div class="card new mb-4 mt-4">
                <img src="{{url(json_decode($new->photos)[0])}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">{{ $new->title }}</h2>
                <p class="card-text">
                    {!! substr($new->subject, 0, 90) !!} ...
                    <a href="{{ route('read', $new->id) }}">قراءة المزيد</a>
                </p>
                    {{-- <div class="like ml-4" style="float: left;width: 40px;height: 40px;">
                        <i class="fas fa-thumbs-up fa-2x d-block"></i>
                        <span>{{ $like }}</span>
                    </div>
                    <div class="dislike" style="float: left;width: 40px;height: 40px;">
                        <i class="fas fa-thumbs-down fa-2x d-block"></i>
                        <span>{{ $dislike }}</span>
                    </div> --}}
                </div>
                <div class="card-footer text-muted">
                تم النشر في {{ $new->created_at }}
                </div>
            </div>
        </div>
    @empty

    @endforelse
    </div>
        {{ $news->links() }}
@endsection

@section('css')
<style>
    .new{
        height:350px
    }
    .new img {
        max-height:100px !important
    }
    .new {
        font-size: 12px;
    }
    .card-title {
        margin-bottom: .75rem;
        font-size: 13px;
        font-weight: bold;
    }
</style>
@endsection
