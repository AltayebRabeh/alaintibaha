@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card col-md-12" style="">
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
                
                @guest
                <div class="text-center" style="color:#4e73df">
                <div class="like" style="float: left;width: 80px;height: 40px;">
                    اعجبني
                    <i class="d-block"></i>
                    <span>{{ App\Http\Controllers\Web\HomeController::like($news->id) }}</span>
                </div>
                <div class="dislike" style="float: left;width: 80px;height: 40px;">
                    لم يعجبني
                    <i class="d-block"></i>
                    <span>{{ App\Http\Controllers\Web\HomeController::dislike($news->id) }}</span>
                </div>
            </div>
                @else
                <div class="text-center" style="color:#4e73df">
                @foreach($news->like as $like)
                    @if($like->user_id == Auth::user()->id && $like->status == 1)
                    <div class="like true" style="float: left;width: 80px;height: 40px;">
                        <a href="{{ route('like', [1,$news->id, Auth::user()->id]) }}">
                        اعجبني
                        <i class="d-block"></i>
                        <span>{{ App\Http\Controllers\Web\HomeController::like($news->id) }}</span>
                        </a>
                    </div>
                    <div class="dislike false" style="float: left;width: 80px;height: 40px;">
                        <a href="{{ route('like', [0,$news->id, Auth::user()->id]) }}">
                        لم يعجبني
                        <i class="d-block"></i>
                        <span>{{ App\Http\Controllers\Web\HomeController::dislike($news->id) }}</span>
                        </a>
                    </div>
                    @endif
                    @if($like->user_id == Auth::user()->id && $like->status != 1)
                    <div class="like false" style="float: left;width: 80px;height: 40px;">
                        <a href="{{ route('like', [1,$news->id, Auth::user()->id]) }}">
                        اعجبني
                        <i class="d-block"></i>
                        <span>{{ App\Http\Controllers\Web\HomeController::like($news->id) }}</span>
                        </a>
                    </div>
                    <div class="dislike true" style="float: left;width: 80px;height: 40px;">
                        <a href="{{ route('like', [0,$news->id, Auth::user()->id]) }}">
                        لم يعجبني
                        <i class="d-block"></i>
                        <span>{{ App\Http\Controllers\Web\HomeController::dislike($news->id) }}</span>
                        </a>
                    </div>
                </div>
            @else

            @endif
                @endforeach
                <div class="comment text-right" style="float: right;width: 100px;height: 40px;">
                    <p><span>{{ App\Http\Controllers\Web\HomeController::countComments($news->id) }}</span> تعليقات</p>
                </div>
                @endguest
                    
                @guest
                    <p class="text-danger">سجل دخولك لكي تستطيع التعليق</p>
                @else
                    <form action="{{ route('send.comment', $news->id) }}" method="POST">
                        <div class="input-group mb-3 mt-5 mp-5 add-comment">
                            @csrf
                            <textarea name="comment" id="comment" class="form-control" placeholder="اكتب تعليقك هنا ..." aria-label="Example text with button addon" aria-describedby="button-addon1"></textarea>
                            <div class="input-group-prepend">
                                <input id="send" type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" value="إرسال">
                            </div>
                        </div>
                        @error('comment')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </form>
                @endguest
                <div class="comments">
                    @foreach($news->comment as $comment)
                        @if($comment->status == 1)
                            <div class="comment"><img src="{{ $comment->user->photo ? : asset('backend/img/undraw_profile.svg') }}"><p><span>{{$comment->user->name}}</span>{{ $comment->comment }}</p></div>
                        @else
                            <div class="comment"style="color:red"><img src="{{ $comment->user->photo ? : asset('backend/img/undraw_profile.svg') }}"><p><span>{{$comment->user->name}}</span>تم حجب التعليق</p></div>
                        @endif
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .add-comment textarea {
            resize: none;
            height: 60px;
        }
        .add-comment .btn {
            height: 30px;
            line-height: 0px;
        }
        .comments {
            padding: 30px 40px 10px 20px;
            border-right: 1px solid #ccc;
        }
        .comments .comment {
            position: relative;
            margin-top: 10px
        }
        .comments .comment p {
            min-width: 50px;
            min-height: 20px;
            border: 1px solid #ccc;
            padding: 10px 2px 6px 14px;
            display: inline-block;
            border-radius: 3px;
            background-color: #ccc;
        }

        .comments .comment p span {
            display: block;
            font-size: 11px;
            margin: 0;
            height: 0;
            position: absolute;
            top: 1px;
            right: 4px;
        }

        .comments .comment p:before {
            content: '';
            display: inline-block;
            border-width: 7px;
            border-style: solid;
            border-color: transparent transparent transparent #ccc;
            position: relative;
            right: -17px;
            top: -8px;
        }

        .comments .comment img {
                width: 40px;
                height: 40px;
                position: absolute;
                right: -61px;
                top: -9px;
        }
        .dislike.true a, .like.true a {

        }
        .dislike.false a, .like.false a {
            color: #333
        }


        .mt-5, .my-5 {
            margin-top: 5rem!important;
        }

    </style>
@endsection

@section('js')

@endsection