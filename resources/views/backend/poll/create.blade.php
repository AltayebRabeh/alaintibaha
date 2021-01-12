@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-right">إضافة إستطلاع</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form class="text-right" action="{{ route('admin.poll.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">وصف الاستطلاع</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                            @error('description')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <table class="table" id="boll">
                        <thead>
                            <tr>
                                <th></th>
                                <th>الاستطلاع عن</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="cloning_row" id="0">
                                <td><i class="fa fa-circle"></i></td>
                                <td>
                                    <input type="text" name="title[0]" id="title" class="title form-control">
                                    @error('title')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <button type="button" class="btn_add btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <input type="submit" class="btn btn-primary" value="حفظ">
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).on('click', '.btn_add', function () {
        let trCount = $('#boll').find('tr.cloning_row:last').length;
        let numberIncr = trCount > 0 ? parseInt($('#boll').find('tr.cloning_row:last').attr('id')) + 1 : 0;

        $('#boll').find('tbody').append($('' +
            '<tr class="cloning_row" id="' + numberIncr + '">' +
            '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
            '<td><input type="text" name="title[' + numberIncr + ']" id="title" class="title form-control"></td>'+
            '</tr>'));
        });

        $(document).on('click', '.delegated-btn', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });

    </script>
@endsection