@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Pembelian</a></li>
                <li class="active">Edit Pembelian</li>
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
                            <strong>Edit</strong> Data Pembelian
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
                            <form action="{{ route('update-purchase', $purchase->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Obat</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="purchase_medicine" id="purchase_medicine" class="form-control">
                                            <option value="">&mdash;Pilih Obat&mdash;</option>
                                            @foreach ($medicines as $medicine)
                                                <option value="{{ $medicine->id }}" {{ ($purchase->id_obat == $medicine->id) ? "selected" : "" }}>{{ $medicine->nama_obat }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('purchase_medicine'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('purchase_medicine') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Distributor</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="purchase_distributor" id="purchase_distributor" class="form-control">
                                            <option value="">&mdash;Pilih Distributor&mdash;</option>
                                            @foreach ($distributors as $distributor)
                                                <option value="{{ $distributor->id }}" {{ ($purchase->id_distributor == $distributor->id) ? "selected" : "" }}>{{ $distributor->nama_distributor }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('purchase_distributor'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('purchase_distributor') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tgl Pembelian</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="date" id="text-input" name="purchase_date" placeholder="" class="form-control" value="{{ $purchase->tanggal_pembelian }}">
                                        @if ($errors->has('purchase_date'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('purchase_date') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kuantitas</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="number" id="text-input" name="purchase_qty" placeholder="" class="form-control" value="{{ $purchase->qty }}">
                                        @if ($errors->has('purchase_qty'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('purchase_qty') }}</p>
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
