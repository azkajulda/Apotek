@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Return Penerimaan</a></li>
                <li class="active">Tambah Return Penerimaan</li>
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
                            <strong>Tambah</strong> Data Return Penerimaan
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
                            <form action="{{ route('store-accept-return') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Obat</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="accept_return_medicine" id="accept_return_medicine" class="form-control">
                                            <option value="">&mdash;Pilih Obat&mdash;</option>
                                            @foreach ($medicines as $medicine)
                                                <option value="{{ $medicine->id }}">{{ $medicine->nama_obat }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('accept_return_medicine'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('accept_return_medicine') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Distributor</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="accept_return_distributor" id="accept_return_distributor" class="form-control">
                                            <option value="">&mdash;Pilih Distributor&mdash;</option>
                                            @foreach ($distributors as $distributor)
                                                <option value="{{ $distributor->id }}">{{ $distributor->nama_distributor }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('accept__return_distributor'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('accept_return_distributor') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Tanggal Return</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="accept_return_purchases" id="accept_return_purchases" class="form-control">
                                            <option value="">&mdash;Pilih Tanggal Return&mdash;</option>
                                            @foreach ($return_purchases as $return_purchase)
                                                <option value="{{ $return_purchase->id }}">{{ $return_purchase->tanggal_return." - ".$return_purchase->keterangan }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('accept_return_purchases'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('accept_return_purchases') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kuantitas</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="number" id="accept_return_qty" name="accept_return_qty" placeholder="" class="form-control" readonly>
                                        @if ($errors->has('accept__return_qty'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('accept_return_qty') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tgl Penerimaan</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="date" id="text-input" name="accept_return_date" placeholder="" class="form-control">
                                        @if ($errors->has('accept__return_date'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('accept_return_date') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Keterangan</label></div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="accept_return_caption" id="textarea-input" rows="3" placeholder="" class="form-control"></textarea>
                                        @if ($errors->has('accept_return_caption'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('accept_return_caption') }}</p>
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
