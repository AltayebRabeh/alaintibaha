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
                            <label for="per">الصلاحيات </label>
                            <select name="permission[]" class="form-control" multiple>
                                <option value="/news">عرض الاخبار</option>
                                <option value="/news/create">إضافة خبر</option>
                                <option value="/news/show/">عرض تفاصيل الخبر</option>
                                <option value="/news/edit/">تعديل خبر</option>
                                <option value="/news/delete/">حذف خبر</option>
                                <option value="/breaking_news">عرض الاخبار العاجلة</option>
                                <option value="/breaking_news/add/">إضافة خبر عاجل</option>
                                <option value="/breaking_news/delete/">حذف خبر عاجل</option>
                                <option value="/ads">عرض الاعلانات</option>
                                <option value="/ads/enable">عرض الاعلانات المفعلة</option>
                                <option value="/ads/create">إضافة إعلان</option>
                                <option value="/ads/show/">عرض تفاصيل الاعلان</option>
                                <option value="/ads/edit/">تعديل إعلان</option>
                                <option value="/ads/delete/">حذف إعلان</option>
                                <option value="/ads/show-hide/">تفعيل و إلغاء تفعيل الاعلانات</option>
                                <option value="/comments">عرض التعليقات</option>
                                <option value="/comments/disiable">عرض التعليقات المحظورة</option>
                                <option value="/comments/show/">عرض تفاصيل التعليق</option>
                                <option value="/comments/show-hide/">حظر و فك حظر التعليقات</option>
                                <option value="/comments/delete/">حذف التعليقات</option>
                                <option value="/admins/all">عرض المدراء</option>
                                <option value="/admins/disiable">عرض المدراء غير المفعلين</option>
                                <option value="/admins/create">إضافة مدير</option>
                                <option value="/admins/show/">عرض تفاصيل المدير</option>
                                <option value="/admins/edit/">تعديل المدراء</option>
                                <option value="/admins/status/">تفعيل و إلغاء تفعيل المدراء</option>
                                <option value="/users/all">عرض المستخدمين</option>
                                <option value="/users/disiable">عرض المستخدمين المحظورين</option>
                                <option value="/users/status/">حظر او فك حظر مستخدم</option>
                                <option value="/poll/all">عرض الاستطلاعات</option>
                                <option value="/poll/enable">عرض الاستطلاعات المفعلة</option>
                                <option value="/poll/create">إضافة إستطلاع</option>
                                <option value="/poll/delete/">حذف إستطلاع</option>
                                <option value="/poll/show-hide/">تفعيل إلغاء او إلغاء تفعيل استطلاع</option>
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
