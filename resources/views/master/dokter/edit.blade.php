@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Dokter</a></li>
                <li class="active">Tambah Dokter</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Data Dokter
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
                            <form action="{{ route('updateDokter',$dokter->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Dokter</label></div>
                                    <div class="col-6 col-md-3">
                                        <input type="text" id="text-input" name="kode_dokter"  value="{{$dokter->kode_dokter}}" placeholder="" class="form-control"><small class="form-text text-muted">*Contoh : D102</small>
                                        @if ($errors->has('kode_dokter'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('kode_dokter') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap Dokter</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="nama_dokter" value="{{$dokter->nama_dokter}}" placeholder="" class="form-control"><small class="form-text text-muted">*Contoh : Ridwan Kusuma Perdana</small>
                                        @if ($errors->has('nama_dokter'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('nama_dokter') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alamat</label></div>
                                    <div class="col-12 col-md-9"><textarea name="alamat" id="alamat" rows="3" placeholder="" class="form-control">{{$dokter->alamat}}</textarea>
                                        @if ($errors->has('alamat'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('alamat') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telepon</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="number" id="text-input" value="{{$dokter->telepon}}" name="telepon" placeholder="" class="form-control">
                                        @if ($errors->has('telepon'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('telepon') }}</p>
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
