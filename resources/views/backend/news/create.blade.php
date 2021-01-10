@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-right">إضافة خبر</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form class="text-right" action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="breaking_news" name="breaking_news" type="checkbox">
                            <label for="breaking_news">إضافة للاخبار العاجلة</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">عنوان الخبر</label>
                            <input id="title" name="title" type="text" class="form-control">
                            @error('title')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photos">إختيار الصور</label>
                            <input id="photos" name="photos[]" multiple type="file" class="form-control">
                            @error('photos')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">الخبر</label>
                    <textarea id="subject" name="subject" type="text" class="form-control"> </textarea>
                    @error('subject')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
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
