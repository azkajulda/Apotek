@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Penjualan</a></li>
                <li class="active">Data Penjualan</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-lg-4">
        <form action="{{route('reportPembelian')}}" method="get">
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Tanggal</label></div>
                <div class="col-12 col-md-9">
                    <input type="date" id="text-input" name="first_date" placeholder="" class="form-control">
                    @if ($errors->has('first_date'))
                        <p style="color:#dc3545;font-size:15px;">{{ $errors->first('first_date') }}</p>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Sampai</label></div>
                <div class="col-12 col-md-9">
                    <input type="date" id="text-input" name="last_date" placeholder="" class="form-control">
                    @if ($errors->has('last_date'))
                        <p style="color:#dc3545;font-size:15px;">{{ $errors->first('last_date') }}</p>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px">
                    <i class="fa fa-print"></i> Cetak
                </button>
        </form>
    </div>
@endsection
