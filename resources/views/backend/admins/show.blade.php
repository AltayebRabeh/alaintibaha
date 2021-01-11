@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="card col-md-12 text-right">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <img style="width:100px; height:100px; margin:auto" class="d-block img-profile rounded-circle" src="{{ isset($admin->photo) ?  url($admin->photo)  : asset('backend/img/undraw_profile.svg') }}"
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
