@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Produsen</a></li>
                <li class="active">Tambah Produsen</li>
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
                            <strong>Tambah</strong> Data Produsen
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
                            <form action="{{ route('update-produsen', $produsens->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pabrik</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="produsen_name" placeholder="" class="form-control" value="{{ $produsens->nama_pabrik }}"><small class="form-text text-muted">*Contoh : PT.Medion Farma Jaya</small>
                                        @if ($errors->has('produsen_name'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('produsen_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alamat</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="produsen_address" id="textarea-input" rows="3" placeholder="" class="form-control">{{ $produsens->alamat }}</textarea>
                                        @if ($errors->has('produsen_address'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('produsen_address') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">No Telepon</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="text" id="text-input" name="produsen_phone" placeholder="" class="form-control" value="{{ $produsens->telepon }}">
                                        @if ($errors->has('produsen_phone'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('produsen_phone') }}</p>
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
