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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">عنوان الخبر</label>
                            <input id="title" name="title" type="text" class="form-control">
                            <span class="form-text text-danger">We'll never share your email with anyone else.</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photos">إختيار الصور</label>
                            <input id="photos" name="photos" type="text" class="form-control">
                            <span class="form-text text-danger">We'll never share your email with anyone else.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">الخبر</label>
                    <input id="subject" name="subject" type="text" class="form-control">
                    <span class="form-text text-danger">We'll never share your email with anyone else.</span>
                </div>
                <input type="submit" class="btn btn-primary" value="حفظ">
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#subject' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
                window.CKEDITOR_TRANSLATIONS = ar;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    </script>
@endsection
