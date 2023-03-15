@extends('layouts.panel')
@section('title')
    Data Kegiatan
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
                        <li class="breadcrumb-item"><a href="/master/Kegiatan">Kegiatan</a></li>
                        <li class="breadcrumb-item active"><a href="#">Buat</a></li>
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
                <h3 class="card-title">Buat Kegiatan</h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                    <a href="/master/kegiatan" class="btn btn-outline-danger btn-sm"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
            <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nm_kegiatan" class="form-label">nama Kegiatan</label>
                                <input type="varchar" name="nm_kegiatan"
                                    class="form-control @error('nm_kegiatan') is-invalid @enderror" id="nm_kegiatan"
                                    value="{{ $kegiatan->nm_kegiatan }}" required maxlength="100" autocomplete="off"
                                    placeholder="Misal: Transfer">
                                @error('nm_kegiatan')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-md-6">

                        <div class="form-group">
                                <label for="nama" class="form-label">Tanggal kegiatan</label>
                                <input type="date" name="tgl_kegiatan" class="form-control">
                            </div>
                        </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="jumlah_pengeluaran" class="form-label">jumlah pengeluaran</label>
                        <input type="text" name="jumlah_pengeluaran"
                            class="form-control @error('jumlah_pengeluaran') is-invalid @enderror" id="jumlah_pengeluaran"
                            value="{{ $kegiatan->jumlah_pengeluaran }}" required min="0"
                            placeholder="Masukan saldo saat ini">
                        @error('jumlah_pengeluaran')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="jumlah_pemasukan" class="form-label">jumlah pemasukan</label>
                <input type="text" name="jumlah_pemasukan"
                    class="form-control @error('jumlah_pemasukan') is-invalid @enderror" id="jumlah_pemasukan"
                    value="{{ $kegiatan->jumlah_pemasukan }}" required min="0"
                    placeholder="Masukan saldo saat ini">
                @error('jumlah_pemasukan')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
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
