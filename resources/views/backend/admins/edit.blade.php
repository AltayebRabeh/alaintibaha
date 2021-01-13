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
                            <img style="width:100px; height:100px; margin:auto" class="d-block img-profile rounded-circle" src="{{ isset($admin->photo) ?  url($admin->photo)  : asset('backend/img/undraw_profile.svg') }}">
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
                    @if (! $superUser)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="per">الصلاحيات </label>
                            <select name="permission[]" class="form-control" multiple>
                                <option {{ array_search('/news', $admin->permission) ? 'selected' : '' }} value="/news">عرض الاخبار</option>
                                <option {{ array_search('/news/create', $admin->permission) ? 'selected' : '' }} value="/news/create">إضافة خبر</option>
                                <option {{ array_search('/news/create', $admin->permission) ? 'selected' : '' }} value="/news/show/">عرض تفاصيل الخبر</option>
                                <option {{ array_search('/news/edit/', $admin->permission) ? 'selected' : '' }}  value="/news/edit/">تعديل خبر</option>
                                <option {{ array_search('/news/delete/', $admin->permission) ? 'selected' : '' }}  value="/news/delete/">حذف خبر</option>
                                <option {{ array_search('/breaking_news', $admin->permission) ? 'selected' : '' }}  value="/breaking_news">عرض الاخبار العاجلة</option>
                                <option {{ array_search('/breaking_news/add/', $admin->permission) ? 'selected' : '' }}  value="/breaking_news/add/">إضافة خبر عاجل</option>
                                <option {{ array_search('/breaking_news/delete/', $admin->permission) ? 'selected' : '' }}  value="/breaking_news/delete/">حذف خبر عاجل</option>
                                <option {{ array_search('/ads', $admin->permission) ? 'selected' : '' }}  value="/ads">عرض الاعلانات</option>
                                <option {{ array_search('/ads/enable', $admin->permission) ? 'selected' : '' }}  value="/ads/enable">عرض الاعلانات المفعلة</option>
                                <option {{ array_search('/ads/create', $admin->permission) ? 'selected' : '' }}  value="/ads/create">إضافة إعلان</option>
                                <option {{ array_search('/ads/show/', $admin->permission) ? 'selected' : '' }}  value="/ads/show/">عرض تفاصيل الاعلان </option>
                                <option {{ array_search('/ads/edit/', $admin->permission) ? 'selected' : '' }}  value="/ads/edit/">تعديل إعلان</option>
                                <option {{ array_search('/ads/delete/"', $admin->permission) ? 'selected' : '' }}  value="/ads/delete/">حذف إعلان</option>
                                <option {{ array_search('/ads/show-hide/', $admin->permission) ? 'selected' : '' }}  value="/ads/show-hide/">تفعيل و إلغاء تفعيل الاعلانات</option>
                                <option {{ array_search('/comments', $admin->permission) ? 'selected' : '' }}  value="/comments">عرض التعليقات</option>
                                <option {{ array_search('/comments/disiable', $admin->permission) ? 'selected' : '' }}  value="/comments/disiable">عرض التعليقات المحظورة</option>
                                <option {{ array_search('/comments/show/', $admin->permission) ? 'selected' : '' }}  value="/comments/show/">عرض تفاصيل التعليق</option>
                                <option {{ array_search('/comments/show-hide/', $admin->permission) ? 'selected' : '' }}  value="/comments/show-hide/">حظر و فك حظر التعليقات</option>
                                <option {{ array_search('/comments/delete/', $admin->permission) ? 'selected' : '' }}  value="/comments/delete/">حذف التعليقات</option>
                                <option {{ array_search('/admins/all', $admin->permission) ? 'selected' : '' }}  value="/admins/all">عرض المدراء</option>
                                <option {{ array_search('/admins/disiable', $admin->permission) ? 'selected' : '' }}  value="/admins/disiable">عرض المدراء غير المفعلين</option>
                                <option {{ array_search('/admins/create', $admin->permission) ? 'selected' : '' }}  value="/admins/create">إضافة مدير</option>
                                <option {{ array_search('/admins/show/', $admin->permission) ? 'selected' : '' }}  value="/admins/show/">عرض تفاصيل المدير</option>
                                <option {{ array_search('/admins/edit/', $admin->permission) ? 'selected' : '' }}  value="/admins/edit/">تعديل المدراء</option>
                                <option {{ array_search('/admins/status/', $admin->permission) ? 'selected' : '' }}  value="/admins/status/">تفعيل و إلغاء تفعيل المدراء</option>
                                <option {{ array_search('/users/all', $admin->permission) ? 'selected' : '' }}  value="/users/all">عرض المستخدمين</option>
                                <option {{ array_search('/users/disiable', $admin->permission) ? 'selected' : '' }}  value="/users/disiable">عرض المستخدمين المحظورين</option>
                                <option {{ array_search('/users/status', $admin->permission) ? 'selected' : '' }}  value="/users/status">حظر مستخدم</option>
                                <option {{ array_search('/poll/all', $admin->permission) ? 'selected' : '' }}  value="/poll">عرض الاستطلاعات</option>
                                <option {{ array_search('/poll/enable', $admin->permission) ? 'selected' : '' }}  value="/poll/enable">عرض الاستطلاعات المفعلة</option>
                                <option {{ array_search('/poll/create', $admin->permission) ? 'selected' : '' }}  value="/poll/create">إضافة إستطلاع</option>
                                <option {{ array_search('/poll/delete/', $admin->permission) ? 'selected' : '' }}  value="/poll/delete/">حذف إستطلاع</option>
                                <option {{ array_search('/poll/show-hide/', $admin->permission) ? 'selected' : '' }}  value="/poll/show-hide/">تفعيل إلغاء او إلغاء تفعيل استطلاع</option>
                            </select>
                            @error('confirm_password')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endif
                </div>
                @if (! $superUser)
                <input type="submit" class="btn btn-primary" value="حفظ">
                @endif
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
