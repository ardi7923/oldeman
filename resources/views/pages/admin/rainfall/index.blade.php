@extends('layouts.app')

@section('title_page')
Curah Hujan
@endsection

@section('styles_page')
<!-- Custom styles for this page -->
<link href="{{ asset('assets-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}">
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">


@endsection

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Curah Hujan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" data-url="{{ url('admin/rainfall/create') }}" data-size="lg" class="btn btn-primary modal_add"> <i class="fa fa-plus"></i> @lang('main.button.add') </button>
            <br><br>
            <table class="table table-bordered table-hover" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Tahun</th>
                        <th>Januari</th>
                        <th>Februari</th>
                        <th>Maret</th>
                        <th>April</th>
                        <th>Mei</th>
                        <th>Juni</th>
                        <th>Juli</th>
                        <th>Agustus</th>
                        <th>September</th>
                        <th>Oktober</th>
                        <th>November</th>
                        <th>Desember</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


<x-modal />

@stop

@section('scripts_page')
<!-- Page level plugins -->
<script src="{{ asset('assets-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendor/datatables/dataTables.bootstrap4.min.js') }} "></script>

<!-- Page level custom scripts -->
<script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: '{{ url("admin/rainfall") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'year'
                },
                {
                    data: 'jan'
                },
                {
                    data: 'feb'
                },
                {
                    data: 'mar'
                },
                {
                    data: 'apr'
                },
                {
                    data: 'may'
                },
                {
                    data: 'jun'
                },
                {
                    data: 'jul'
                },
                {
                    data: 'ags'
                },
                {
                    data: 'sep'
                },
                {
                    data: 'oct'
                },
                {
                    data: 'nov'
                },
                {
                    data: 'des'
                }, 
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },

            ],
            fixedColumns: {
                leftColumns: 2,
            }
        });
    });

    $(".modal_add").click(showForm);
    $('body').on("click", ".btn_edit", showForm);
    $('body').on("click", ".btn_detail", showForm);
    $('body').on("click", ".btn_delete", deleteForm);

    $('#modals').on("submit", ".forms", saveForm);
    $('#modals').on("submit", ".edit-form", saveForm);
</script>
@endsection