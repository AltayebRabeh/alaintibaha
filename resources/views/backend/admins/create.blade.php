@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-right">إضافة مدير</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form class="text-right" action="{{ route('admin.admins.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="status" name="status" type="checkbox" checked>
                            <label for="status">مفعل</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">الاسم </label>
                            <input id="name" name="name" type="text" class="form-control">
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">البريد الالكتروني </label>
                            <input id="email" name="email" type="email" class="form-control">
                            @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="confirm_password">الصلاحيات </label>
                            <select name="permission[]" class="form-control" multiple>
                                <option value="/"></option>
                                <option value="/news/create"></option>
                                <option value="/news/edit/"></option>
                                <option value="/news/delete/"></option>
                                <option value="/breaking_news"></option>
                                <option value="/breaking_news/add/"></option>
                                <option value="/breaking_news/delete/"></option>
                                <option value="/ads"></option>
                                <option value="/ads/enable"></option>
                                <option value="/ads/create"></option>
                                <option value="/ads/show/"></option>
                                <option value="/ads/edit/"></option>
                                <option value="/ads/delete/"></option>
                                <option value="/ads/show-hide/"></option>
                                <option value="/comments"></option>
                                <option value="/comments/disiable"></option>
                                <option value="/comments/show/"></option>
                                <option value="/comments/show-hide/"></option>
                                <option value="/comments/delete/"></option>
                                <option value="/admins/all"></option>
                                <option value="/admins/disiable"></option>
                                <option value="/admins/create"></option>
                                <option value="/admins/show/"></option>
                                <option value="/admins/edit/"></option>
                                <option value="/admins/status/"></option>
                                <option value="/users/all"></option>
                                <option value="/users/disiable"></option>
                                <option value="/users/status/"></option>
                            </select>
                            @error('confirm_password')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="حفظ">
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
