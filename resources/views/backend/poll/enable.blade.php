@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">الاستطلاعات المفعلة</h1>
        <a href="{{ route('admin.poll.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> إضافة إستطلاع</a>
    </div>

    <!-- Content Row -->
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
                    @endforeach
                    @if(! isset($value->breakingNews->id))
                        <a href="#" id="hide-btn" data-hide="{{ route('admin.poll.show_hide', $poll->id) }}" data-toggle="modal" data-target="#hideModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> {{ $poll->status == 0 ? 'إظهار' : 'اخفاء' }}</a>
                    @endif
                    <a href="#" id="delete-btn" data-delete="{{ route('admin.poll.delete', $poll->id) }}" data-toggle="modal" data-target="#deleteModal" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> حذف</a>
                </div>
            </div>
        @empty

        @endforelse
    @endif
@endsection
