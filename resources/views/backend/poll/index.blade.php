@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">الاعلانات</h1>
        <a href="{{ route('admin.ads.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> إضافة إعلان</a>
    </div>

    <!-- Content Row -->
    @if($polls)
        @forelse($polls as $poll)
        <div class="card col-md-12" style="">
            <div class="card-header">
                {{ $poll->description }}
            </div>
            <div class="card-body text-right">

            </div>
        </div>
        @empty

        @endforelse
    @endif
@endsection
