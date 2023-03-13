@extends('layouts.panel')
@section('title')
    Data Pengguna
@endsection

@push('style')
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="/master/pengguna">Buat Pengguna</a></li>
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
                <h3 class="card-title">Edit Pengguna</h3>

                <div class="card-tools">
                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button> --}}
                    <a href="/master/Pengguna" class="btn btn-outline-danger btn-sm"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
            <form action="{{ route('Pengguna.update', $pengguna->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                           <label for="Pengguna" class="form-label">Nama Pengguna</label>
                            <input type="varchar" name="nama"
                                class="form-control @error('Pengguna') is-invalid @enderror" id="nama"
                                value="{{ $pengguna->nama }}" required maxlength="100" autocomplete="off"
                                 placeholder="">
                            @error('nama')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-8">
                             <div class="form-group">
                                <label for="enum" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                                    value="{{ $pengguna->jenis_kelamin }}" required min="0">
                                    <option>--Pilih Jenis Kelamin--</option>
                                    <option>laki-laki</option>
                                    <option> perempuan</option>


                                </select>
                                 @error('Gagal')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8">


                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="Varchar" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    value="{{ $pengguna->alamat }}" required min="0"
                                    placeholder="Cianjur">
                                @error('Gagal')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                              @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning"> Simpan</button>
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
