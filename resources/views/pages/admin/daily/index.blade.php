@extends('layouts.app')

@section('title_page')
Data Bulanan
@endsection

@section('styles_page')
<!-- Custom styles for this page -->
<link href="{{ asset('assets-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">


@endsection

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Harian</h6>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-2">
                <label>Tanggal Lahir</label>
            </div>
            <div class="col-md-4">
                <input class="form-control datepicker" id="date" type="text" placeholder="" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}" readonly>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary btn-search"> <i class="fa fa-search"></i> Cari </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Curah Hujan</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($dailies as $i => $s)
                    <tr>
                        <td class="font-weight-bold">{{ $i+1 }}</td>
                        <td class="font-weight-bold">{{ \Carbon\Carbon::parse($s->time)->format('d M Y H:s') }}</td>
                        <td>{{ $s->rainfall }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; font-weight: bold;"> Data Kosong</td>
                    </tr>
                    @endforelse
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
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@endsection

@section('js')

<script type="text/javascript">
    $('.btn-search').click(function() {
        date = $("#date").val();
        window.location.href = "daily?date="+date;
    });

    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        startView: 1,
        autoclose: true
    });
</script>
@endsection