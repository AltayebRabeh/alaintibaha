@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">الاخبار العاجلة</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive text-right">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>التاريخ</th>
                        <th>المحرر</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @if($breaking_news)
                        @forelse($breaking_news as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td><a href="{{ route('admin.news.show', $value->news->id) }}">{{ $value->news->title }}</a></td>
                                <td>{{ $value->created_at }}</td>
                                <td><a href="{{ route('admin.admins.show', $value->admin->id) }}">{{ $value->admin->name }}</td>
                                <td>
                                    <a href="#" id="delete-btn" data-delete="{{ route('admin.breaking_news.delete', $value->id) }}" data-toggle="modal" data-target="#deleteModal" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">لايوجد شئ</td>
                            </tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
            {{ $breaking_news->links() }}
        </div>
    </div>
@endsection
