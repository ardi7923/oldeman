@extends('layouts.app')

@section('title_page')
Data Bulanan
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
        <h6 class="m-0 font-weight-bold text-primary">Data Bulanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthlies as $i => $m)
                    <tr>
                        <td class="font-weight-bold">{{ $i+1 }}</td>
                        <td class="font-weight-bold">{{ $m->year }}</td>
                        <td>{{ round($m->jan,0) }}</td>
                        <td>{{ round($m->feb,0) }}</td>
                        <td>{{ round($m->mar,0) }}</td>
                        <td>{{ round($m->apr,0) }}</td>
                        <td>{{ round($m->may,0) }}</td>
                        <td>{{ round($m->jun,0) }}</td>
                        <td>{{ round($m->jul,0) }}</td>
                        <td>{{ round($m->ags,0) }}</td>
                        <td>{{ round($m->sep,0) }}</td>
                        <td>{{ round($m->oct,0) }}</td>
                        <td>{{ round($m->nov,0) }}</td>
                        <td>{{ round($m->des,0) }}</td>
                    </tr>
                    @endforeach
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

</script>
@endsection