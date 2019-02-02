@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Distributor</a></li>
                <li class="active">Edit Distributor</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn"> <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Data Distributor
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
                            @foreach ($distributors as $distributor)
                                <form action="{{ route('update-distributor', $distributor->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Distributor</label></div>
                                            <div class="col-6 col-md-3">
                                                <input type="text" id="text-input" name="distributor_code" placeholder="" class="form-control" value="{{ $distributor->kode_distributor }}"><small class="form-text text-muted">*Contoh : D102</small>
                                                @if ($errors->has('distributor_code'))
                                                    <p style="color:#dc3545;font-size:15px;">{{ $errors->first('distributor_code') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap Distributor</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="distributor_name" placeholder="" class="form-control" value="{{ $distributor->nama_distributor }}"><small class="form-text text-muted">*Contoh : Ridwan Kusuma Perdana</small>
                                                @if ($errors->has('distributor_name'))
                                                    <p style="color:#dc3545;font-size:15px;">{{ $errors->first('distributor_name') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alamat</label></div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="distributor_address" id="textarea-input" rows="3" placeholder="" class="form-control">{{ $distributor->alamat }}</textarea>
                                                @if ($errors->has('distributor_address'))
                                                    <p style="color:#dc3545;font-size:15px;">{{ $errors->first('distributor_address') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kota</label></div>
                                            <div class="col-12 col-md-3">
                                                <input type="text" id="text-input" name="distributor_city" placeholder="" class="form-control" value="{{ $distributor->kota }}">
                                                @if ($errors->has('distributor_city'))
                                                    <p style="color:#dc3545;font-size:15px;">{{ $errors->first('distributor_city') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">No Telepon</label></div>
                                            <div class="col-12 col-md-3">
                                                <input type="text" id="text-input" name="distributor_phone" placeholder="" class="form-control" value="{{ $distributor->telepon }}">
                                                @if ($errors->has('distributor_phone'))
                                                    <p style="color:#dc3545;font-size:15px;">{{ $errors->first('distributor_phone') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">No Rekening</label></div>
                                            <div class="col-12 col-md-3">
                                                <input type="number" id="distributor_account" name="distributor_account" placeholder="" class="form-control" value="{{ $distributor->no_rek }}">
                                                @if ($errors->has('distributor_account'))
                                                    <p style="color:#dc3545;font-size:15px;">{{ $errors->first('distributor_account') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="distributor_email" placeholder="" class="form-control" value="{{ $distributor->Email }}">
                                                @if ($errors->has('distributor_email'))
                                                    <p style="color:#dc3545;font-size:15px;">{{ $errors->first('distributor_email') }}</p>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
