@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">الاستطلاعات</h1>
    </div>

    <!-- Content Row -->
    {{-- {{ dd($polls) }} --}}

    @guest
        <h4>سجل دخولك للمشاركة في الاستطلاعات</h4>
    @else
    @if($polls)
        @forelse($polls as $poll)
            <div class="card col-md-12 y text-right mb-5 pb-5 {{ $poll->status == 0 ? 'alert-warning' :  ''}}" style="">
                <div class="card-header">
                    {{ $poll->description }}
                </div>
                <div class="card-bod">
                    @foreach ($poll->details as $detail)
                        <p class="mb-0">{{ $detail->title }} </p>
                        <span>  {{ $detail->vote->count() }}</span>صوت
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" style="width: {{ App\Http\Controllers\Admin\PollController::sumVote($poll->id) != 0 && $detail->vote->count() != 0 ?  100 / (App\Http\Controllers\Admin\PollController::sumVote($poll->id) / $detail->vote->count()) : 0 }}%" aria-valuemin="0" aria-valuemax="100">{{ App\Http\Controllers\Admin\PollController::sumVote($poll->id) != 0 && $detail->vote->count() != 0 ?  100 / (App\Http\Controllers\Admin\PollController::sumVote($poll->id) / $detail->vote->count()) : 0 }}%</div>
                        </div>
                        @foreach($detail->vote as $vote)
                            @if($vote->user_id == Auth::user()->id)
                                تم التصويت
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        @empty

        @endforelse
    @endif
    @endguest
@endsection