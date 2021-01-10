@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">المستخدمين المحظورين</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive text-right">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>تاريخ التسجيل</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users)
                        @forelse($users as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>
                                    <a href="#" id="hide-btn" data-hide="{{ route('admin.users.status', $value->id) }}" data-toggle="modal" data-target="#hideModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa fa-sm text-white-50"></i> إلغاء الحظر</a>
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
            {{ $users->links() }}
        </div>
    </div>
@endsection
