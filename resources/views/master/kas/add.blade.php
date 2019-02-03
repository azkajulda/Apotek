@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Kas</a></li>
                <li class="active">Tambah Kas</li>
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
                            <strong>Tambah</strong> Data Kas Apotek
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
                            <form action="{{ route('uploadKas') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal</label></div>
                                    <div class="col-6 col-md-3">
                                        <input type="date" id="text-input" name="tanggal" placeholder="" class="form-control"><small class="form-text text-muted"></small>
                                        @if ($errors->has('tanggal'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('tanggal') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="keterangan" placeholder="" class="form-control"><small class="form-text text-muted"></small>
                                        @if ($errors->has('keterangan'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('keterangan') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total Nominal</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="text-input" name="nominal" placeholder="" class="form-control"><small class="form-text text-muted"></small>
                                        @if ($errors->has('nominal'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('nominal') }}</p>
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