@extends('layouts.panel')
@section('title')
    Transaksi
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
                    <h1>Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
                        <li class="breadcrumb-item active"><a href="#">Daftar Transaksi</a></li>
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
                <h3 class="card-title">Daftar Transaksi</h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                    <a href="/master/transaksi/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Buat Transaksi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TANGGAL</th>
                                <th>NAMA TRANSAKSI</th>
                                <th>KETERANGAN</th>
                                <th>NAMA KEGIATAN</th>
                                <th>JENIS TERANSAKSI</th>
                                <th>JUMLAH</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $i->tgl_transaksi }}</td>
                                    <td>{{ $i->nm_transaksi }}</td>
                                    <td>{{ $i->keterangan }}</td>
                                    <td>{{ $i->kegiatan->nm_kegiatan}}</td>
                                    <td>{{ $i->jenis_trx}}</td>
                                    <td>Rp.{{ number_format($i->jumlah, 2, '.', '.') }}</td>
                                    <td>
                                        <a href="/master/transaksi/{{$i->id}}/edit" class="btn btn-sm btn-warning">Ubah</a>
                                        <form action="/master/transaksi/{{$i->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                         <button onclick="return confirm('Yakin akan dihapus?')" type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@push('script')
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        })
    </script>
@endpush
