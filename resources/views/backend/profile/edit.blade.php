@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-right">تعديل الملف الشخصي</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form class="text-right" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">الاسم </label>
                            <input id="name" value="{{ $admin->name }}" name="name" type="text" class="form-control">
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">البريد الالكتروني </label>
                            <input id="email" value="{{ $admin->email }}" required name="email" type="email" class="form-control">
                            @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photo">إختيار الصور</label>
                            <input id="photo" name="photo" type="file" class="form-control">
                            @error('photo')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="حفظ">
            </form>
            <form class="text-right pt-5" action="{{ route('admin.profile.password') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">كلمة المرور </label>
                            <input id="password" name="password" type="password" class="form-control">
                            @error('password')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirm">إعادة كلمة المرور </label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control">
                            @error('password-confirm')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="تغيير كلمة المرور">
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.config.extraPlugins = 'embed';
        CKEDITOR.config.language = 'ar';
        CKEDITOR.replace('subject');
    </script>
@endsection
