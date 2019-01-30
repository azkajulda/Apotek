@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Karyawan</a></li>
                <li class="active">Tambah Karyawan</li>
            </ol>
        </div>
    </div>
@endsection
@section('oontent')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Update</strong> Data Karyawan
                        </div>
                        <div class="card-body card-block">
                            @if (session('alert'))
                                <div class="alert alert-danger">
                                    {{ session('alert') }}
                                </div>
                            @elseif(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('delete'))
                                <div class="alert alert-warning">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            <form action="{{ route('updateKaryawan',$karyawan->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Karyawan</label></div>
                                    <div class="col-6 col-md-3">
                                        <input type="text" id="text-input" name="kode_karyawan" placeholder="" value="{{$karyawan->kode_karyawan}}" class="form-control"><small class="form-text text-muted">*Contoh : K102</small>
                                        @if ($errors->has('kode_karyawan'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('kode_karyawan') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap Karyawan</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="nama_karyawan" placeholder="" value="{{$karyawan->nama_karyawan}}" class="form-control"><small class="form-text text-muted">*Contoh : Ridwan Kusuma Perdana</small>
                                        @if ($errors->has('nama_karyawan'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('nama_karyawan') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jabatan Karyawan</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="jabatan" placeholder="" value="{{$karyawan->jabatan}}" class="form-control"><small class="form-text text-muted">*Contoh : Ridwan Kusuma Perdana</small>
                                        @if ($errors->has('jabatan'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('jabatan') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" value="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
