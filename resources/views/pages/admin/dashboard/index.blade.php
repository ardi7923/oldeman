@extends('layouts.app')

@section('title_page')
Dashboard
@endsection

@section('styles_page')
<!-- Custom styles for this page -->
<link href="{{ asset('assets-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

@endsection

@section('content')


<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>



  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-4 col-lg-4">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">History Data (10 Data Terakhir) </h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>

          </div>
        </div>
        <!-- Card Body -->

        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th width="50px"> No</th>
                  <th>Waktu</th>
                  <th> Curah Hujan </th>
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
    </div>

    <div class="col-xl-8 col-lg-8">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Statistk Data Hari ini </h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>

          </div>
        </div>
        <div class="card-body">
          <canvas id="myChart" width="120%" height="50" style="margin: 10px 10px 10px 10px;"></canvas>
        </div>
      </div>
    </div>

    <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Statistk Data Tahun ini </h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>

          </div>
        </div>
        <div class="card-body">
          <canvas id="ChartMonthly" width="120%" height="50" style="margin: 10px 10px 10px 10px;"></canvas>
        </div>
      </div>
    </div>
  </div>

  @stop

  @section('scripts_page')

  <!-- Page level custom scripts -->
  <script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  <script src="{{  asset('assets-admin/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

  @endsection

  @section('js')

  <script type="text/javascript">
    $(document).ready(function() {
      statistikDaily();
      statistikMonthly();
    });

    function statistikDaily() {
      var dataDaily = [];
      var labelDaily = [];

      @foreach($statistik_dailies as $sd)
      dataDaily.push('{{$sd->rainfall}}');
      labelDaily.push('{{\Carbon\Carbon::parse($sd->time)->format("H:i:s")}}');
      @endforeach

      var dailyData = {
        labels: labelDaily,
        datasets: [{
          label: "Data Harian",
          data: dataDaily,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1,
        }]
      };

      var chartOptions = {
        legend: {
          display: true,
          position: 'top',

          labels: {
            boxWidth: 80,
            fontColor: 'black'
          },

        }
      };
      var ctx = document.getElementById('myChart').getContext('2d');
      return myChart = new Chart(ctx, {
        type: 'line',
        data: dailyData,
        options: chartOptions
      });
    }

    function statistikMonthly() {
      var dataMonthly = [
                        parseInt("{{ $statistik_monthlies->jan }}"),
                        parseInt("{{ $statistik_monthlies->feb }}"),
                        parseInt("{{ $statistik_monthlies->mar }}"),
                        parseInt("{{ $statistik_monthlies->apr }}"),
                        parseInt("{{ $statistik_monthlies->may }}"),
                        parseInt("{{ $statistik_monthlies->jun }}"),
                        parseInt("{{ $statistik_monthlies->jul }}"),
                        parseInt("{{ $statistik_monthlies->ags }}"),
                        parseInt("{{ $statistik_monthlies->sep }}"),
                        parseInt("{{ $statistik_monthlies->oct }}"),
                        parseInt("{{ $statistik_monthlies->nov }}"),
                        parseInt("{{ $statistik_monthlies->des }}"),
                      ];
      var labelMonthly = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des"];


      var MonthlyData = {
        labels: labelMonthly,
        datasets: [{
          label: "Data Bulanan",
          data: dataMonthly,
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1,
        }]
      };

      var chartOptions = {
        legend: {
          display: true,
          position: 'top',

          labels: {
            boxWidth: 80,
            fontColor: 'black'
          },

        }
      };
      var ctx = document.getElementById('ChartMonthly').getContext('2d');
      return myChart = new Chart(ctx, {
        type: 'line',
        data: MonthlyData,
        options: chartOptions
      });
    }
  </script>
  @endsection