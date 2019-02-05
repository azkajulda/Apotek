@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Penjualan</a></li>
                <li class="active">Tambah Penjualan</li>
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
                            <strong>Tambah</strong> Data Penjualan
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
                            <form action="{{ route('store-sell') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Obat</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="sales_medicine" id="sales_medicine" class="form-control">
                                            <option value="">&mdash;Pilih Obat&mdash;</option>
                                            @foreach ($medicines as $medicine)
                                                <option value="{{ $medicine->id }}">{{ $medicine->nama_obat }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sales_medicine'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('sales_medicine') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Konsumen</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="sales_consument" id="sales_consument" class="form-control">
                                            <option value="">&mdash;Pilih Konsumen&mdash;</option>
                                            @foreach ($consumens as $consumen)
                                                <option value="{{ $consumen->id }}">{{ $consumen->nama_konsumen }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sales_consument'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('sales_consument') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Dokter</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="sales_doctor" id="sales_doctor" class="form-control">
                                            <option value="">&mdash;Pilih Dokter&mdash;</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->nama_dokter }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sales_doctor'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('sales_doctor') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tgl Penjualan</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="date" id="text-input" name="sales_date" placeholder="" class="form-control">
                                        @if ($errors->has('sales_date'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('sales_date') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kuantitas</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="number" id="text-input" name="sales_qty" placeholder="" class="form-control">

                                        <input name="documentID" onmouseover="this.focus();" type="text">
                                        @if ($errors->has('sales_qty'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('sales_qty') }}</p>
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
