@extends('layouts.panel')
@section('title')
    Data Saldo
@endsection

@push('style')
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="/master/saldo">Saldo</a></li>
                        <li class="breadcrumb-item active"><a href="#">Hapus</a></li>
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
                <h3 class="card-title">Hapus Saldo</h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                </div>
            </div>
            <form action="/master/saldo" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Saldo</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    value="{{ old('nama') }}" required maxlength="100" autocomplete="off"
                                    placeholder="Misal: Rekening BCA Perusahaan">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="jumlah" class="form-label">Jumlah Saldo</label>
                                <input type="text" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                    value="{{ old('jumlah') }}" required min="0"
                                    placeholder="Masukan sisa saldo saat ini">
                                @error('jumlah')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-hapus"></i> hapus</button>
                    <button type="reset" class="btn btn-outline-secondary">hapus</button>
                </div>
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@push('script')
@endpush
