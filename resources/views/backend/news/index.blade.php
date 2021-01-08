@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">الاخبار</h1>
        <a href="{{ route('admin.news.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> إضافة خبر</a>
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
                    @if($news)
                        @forelse($news as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->created_At }}</td>
                                <td>{{ $value->admin->name }}</td>
                                <td>
                                    <a href="{{ route('admin.news.edit', $value->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i> تعديل</a>
                                    <a href="{{ route('admin.news.show', $value->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-info-circle fa-sm text-white-50"></i> عرض</a>
                                    <a href="#" id="delete-btn" data-delete="{{ route('admin.news.delete', $value->id) }}" data-toggle="modal" data-target="#deleteModal" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">لايوجد شئ</td>
                            </tr>
                        @endforelse
                    @endif
                </tbody>
                <tfoot>
                    {{ $news->links() }}
                </tfoot>
            </table>
        </div>
    </div>

@endsection
