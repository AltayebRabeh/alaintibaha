@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-right">تعديل الملف الشخصي</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form class="text-right" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">الاسم </label>
                            <input id="name" value="{{ $user->name }}" name="name" type="text" class="form-control">
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">البريد الالكتروني </label>
                            <input id="email" value="{{ $user->email }}" required name="email" type="email" class="form-control">
                            @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">العمر  </label>
                                <input id="age" max="99" min="6" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('email') }}">
                            @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sex">الجنس </label>
                            <select id="sex" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" >
                                    <option></option>
                                    <option value="ذكر">ذكر</option>
                                    <option value="انثى">انثى</option>
                                </select>                            @error('email')
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
