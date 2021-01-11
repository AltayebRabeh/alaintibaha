@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-right">تعديل مدير</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form class="text-right" action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img style="width:100px; height:100px; margin:auto" class="d-block img-profile rounded-circle" src="{{ isset($admin->photo) ?  url($admin->photo)  : asset('backend/img/undraw_profile.svg') }}"
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="h4">الاسم</label>
                            <label class="d-block">{{ $admin->name }}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="h4">البريد الالكتروني</label>
                            <label class="d-block">{{ $admin->email }}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="h4">الحالة</label>
                            <label class="d-block">{{ $admin->status == 0 ? 'غير مفعل' : 'مفعل' }}</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="per">الصلاحيات </label>
                            <select name="permission[]" class="form-control" multiple>
                                <option {{ $admin->permission ? '' : '' }} value="/"></option>
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
