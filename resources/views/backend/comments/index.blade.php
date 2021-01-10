@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">التعليقات</h1>
        <a href="{{ route('admin.news.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> إضافة خبر</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive text-right">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>التعليق</th>
                        <th>المنشور</th>
                        <th>المستخدم</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>   
                    @if($comments)
                        @forelse($comments as $key => $value)
                            <tr class="{{ $value->status == 0 ? 'alert-warning' : '' }}">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->comment }}</td>
                                <td><a href="{{ route('admin.news.show', $value->news->id) }}">{{ $value->news->title }}</a></td>
                                <td>{{ $value->user->name }}</td>
                                <td>
                                    <a href="{{ route('admin.comments.show', $value->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-info-circle fa-sm text-white-50"></i> عرض</a>
                                    <a href="#" id="hide-btn" data-hide="{{ route('admin.comments.show_hide', $value->id) }}" data-toggle="modal" data-target="#hideModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa- fa-sm text-white-50"></i> {{ $value->status == 0 ? 'إظهار' : 'اخفاء' }}</a>
                                    <a href="#" id="delete-btn" data-delete="{{ route('admin.comments.delete', $value->id) }}" data-toggle="modal" data-target="#deleteModal" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash fa-sm text-white-50"></i> حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">لايوجد شئ</td>
                            </tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
            {{ $comments->links() }}
        </div>
    </div>
@endsection
