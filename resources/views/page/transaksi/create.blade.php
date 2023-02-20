@extends('layouts.panel')
@section('title')
    Buat Transaksi
@endsection

@push('style')
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
                        <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                        <li class="breadcrumb-item active"><a href="/master/transaksi/create">Buat Transaksi</a></li>
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
                <h3 class="card-title">Buat Transaksi</h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                    <a href="/master/transaksi" class="btn btn-outline-danger btn-sm"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
            <form action="/master/transaksi" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">  
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Transaksi</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    value="{{ old('nama') }}" required maxlength="100" autocomplete="off"
                                    placeholder="#">
                                @error('nama')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                    value="{{ old('keterangan') }}" required min="0"
                                    placeholder="#">
                                @error('keterangan')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="form-label">Jumlah Nominal </label>
                                <input type="number" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                    value="{{ old('jumlah') }}" required min="0"
                                    placeholder="#">
                                @error('jumlah')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Saldo</label>
                                <select name="saldo"
                                    class="form-control @error('saldo') is-invalid @enderror" id="saldo"
                                    value="{{ old('nm_saldo') }}" required min="0">
                                    <option>--Pilih Saldo--</option>
                                    @foreach($saldo as $value)
                                    <option value="{{ $value->id }}">{{ $value->nm_saldo }}</option>
                                    @endforeach
                               
                                </select>
                                @error('keterangan')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>                        
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
