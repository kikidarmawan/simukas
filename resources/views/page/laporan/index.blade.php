@extends('layouts.panel')
@section('title')
    riwayat transaksi
@endsection

@push('style')
    <link rel="stylesheet" href="/views/page/kegiatan/database.bootstrap4.min.css">
    <link rel="stylesheet" href="/views/page/kegiatan/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/views/page/kegiatan/buttons.bootstrap4.min.css">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riwayat Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/transaksi">Riwayat Transaksi</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Transaksi Bulanan</h3>

            </div>
            <div class="card-body">
                <!-- /.card -->
        <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="areaChart" height="250" style="height: 250px;"></canvas>
                    </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        
    </section>
    <!-- /.content -->
@endsection

@push('script')   
<script src="/../plugins/chart.js/Chart.min.js"></script>
<script>
    $(function () {
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels  : {!! json_encode($tanggal) !!},
        datasets: [
          {
            label               : 'pengeluaran',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : {!! json_encode($dataJumlah) !!}
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        datasetFill : false,
        legend: {
          display: true
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : true,
            }
          }],
          yAxes: [{
            gridLines : {
              display : true,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      new Chart(areaChartCanvas, {
        type: 'bar',
        data: areaChartData,
        options: areaChartOptions
      })

    })
  </script>
@endpush
