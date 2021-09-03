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
<style>
.white{
    color:white;
}
</style>
@endsection

@section('content')


<!-- DataTales Example -->
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Klarifikasi Oldeman</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>BULAN</th>
                                @foreach ($monthlies as $m)
                                <th> {{ $m->year }} </th>
                                @endforeach
                                <th class="bg-danger white"> Prediksi <br> 2021 </th>
                                <th class="bg-danger white"> Prediksi <br> 2022 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Januari</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->jan }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->jan }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Februari</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->feb }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->feb }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Maret</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->mar }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->mar }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>April</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->apr }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->apr }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Mei</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->may }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->may }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Juni</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->jun }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->jun }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Juli</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->jul }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->jul }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Agustus</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->ags }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->ags }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>September</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->sep }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->sep }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Oktober</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->oct }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->oct }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>November</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->nov }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->oct }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Desember</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->des }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->des }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Jumlah Bulan Basah</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->bb }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->bb }} </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Jumlah Bulan Kering</th>
                                @foreach ($monthlies as $m)
                                <td> {{ $m->bk }} </td>
                                @endforeach
                                @foreach ($predictions as $p)
                                <td class="bg-danger white"> {{ $p->bk }} </td>
                                @endforeach
                            </tr>
                            <tr style="background-color: #2ecc71; color: white;">
                                <th>Hasil Klasifikasi Iklim (Oldeman)</th>
                                @foreach ($monthlies as $m)
                                <th> {{ $m->oldeman }} </th>
                                @endforeach

                                @foreach ($predictions as $p)
                                <th class="bg-danger white"> {{ $p->oldeman }} </th>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Klarifikasi Oldeman</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="text-align: center;">
                    <tr>
                        <th>Tipe Iklim Oldeman</th>
                        <th>Bulan Basah</th>
                        <th>Bulan Kering</th>
                    </tr>
                    <tr>
                        <th> A </th>
                        <th> > 9 </th>
                        <th>
                            < 2 </th>
                    </tr>
                    <tr>
                        <th> B1 </th>
                        <th> 7-9 </th>
                        <th>
                            < 2 </th>
                    </tr>
                    <tr>
                        <th> B2 </th>
                        <th> 7-9 </th>
                        <th> 2-3 </th>
                    </tr>
                    <tr>
                        <th> C1 </th>
                        <th> 5-6 </th>
                        <th>
                            < 2 </th>
                    </tr>
                    <tr>
                        <th> C2 </th>
                        <th> 5-6 </th>
                        <th> 2-3 </th>
                    </tr>
                    <tr>
                        <th> C3 </th>
                        <th> 5-6 </th>
                        <th> 4-6 </th>
                    </tr>
                    <tr>
                        <th> D1 </th>
                        <th> 3-4 </th>
                        <th>
                            < 2 </th>
                    </tr>
                    <tr>
                        <th> D2 </th>
                        <th> 3-4 </th>
                        <th> 2-3 </th>
                    </tr>
                    <tr>
                        <th> D3 </th>
                        <th> 3-4 </th>
                        <th> 4-6 </th>
                    </tr>
                    <tr>
                        <th> D4 </th>
                        <th> 3-4 </th>
                        <th> > 6 </th>
                    </tr>
                    <tr>
                        <th> E1 </th>
                        <th>
                            < 3 </th>
                        <th>
                            < 2 </th>
                    </tr>
                    <tr>
                        <th> E2 </th>
                        <th>
                            < 3 </th>
                        <th> 2-3 </th>
                    </tr>
                    <tr>
                        <th> E3 </th>
                        <th>
                            < 3 </th>
                        <th> 4-6 </th>
                    </tr>
                    <tr>
                        <th> E4 </th>
                        <th>
                            < 3 </th>
                        <th> > 6 </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Keterangan Oldeman</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-striped">
                    <tr>
                        <th> Tahun</th>
                        <th> Keterangan</th>
                    </tr>
                    @foreach ($monthlies as $m)
                    <tr>
                        <th>{{ $m->year }} ({{ $m->oldeman }})</th> 
                        <th>{{ description_oldeman($m->oldeman) }}</th> 
                    </tr>
                    @endforeach

                    @foreach ($predictions as $p)
                    <tr>
                        <th class="bg-danger white"> Prediksi {{ $p->year }} ({{ $p->oldeman }})</th> 
                        <th class="bg-danger white">{{ description_oldeman($p->oldeman) }}</th> 
                    </tr>
                    @endforeach
                </table>

            </div>
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