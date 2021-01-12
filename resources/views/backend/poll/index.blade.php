@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">الاستطلاعات</h1>
        <a href="{{ route('admin.poll.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> إضافة إستطلاع</a>
    </div>

    <!-- Content Row -->
    @if($polls)
        @forelse($polls as $poll)
        <div class="card col-md-12" style="">
            <div class="card-header">
                {{ $poll->description }}
            </div>
            <div class="card-body text-right">
                @foreach ($poll->details as $detail)
                    {{ $detail->title }} {{ $detail->vote->count() }}  <br> 
                @endforeach
            </div>
        </div>
        @empty

        @endforelse
    @endif
@endsection