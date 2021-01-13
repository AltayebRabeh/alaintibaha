@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="float:right">الملف الشخصي</h1>
        <a href="{{ route('admin.profile.edit') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"> </i> تعديل الملف الشخصي</a>
    </div>
    <div class="row">
        <div class="card col-md-12 text-right">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-4">
                        <img style="width:100px; height:100px; margin:auto" class="d-block img-profile rounded-circle" src="{{ isset($admin->photo) ?  url($admin->photo)  : asset('backend/img/undraw_profile.svg') }}">
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="h4">الاسم</label>
                        <label class="d-block">{{ $admin->name }}</label>
                    </div>
                    <div class="form-group">
                        <label class="h4">البريد الالكتروني</label>
                        <label class="d-block">{{ $admin->email }}</label>
                    </div>
                    <div class="form-group">
                        <label class="h4">الحالة</label>
                        <label class="d-block">{{ $admin->status == 0 ? 'غير مفعل' : 'مفعل' }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
