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
            <div class="row" style="padding-left: 10px">
                <div class="col-lg-12 row">
                    <div class="col col-md-4" style="padding: 5px">
                        <div class="card" style="padding: 10px">
                            <form action="{{ route('store-accept-return') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Kode Barang</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <input type="number" id="text-input" name="sales_qty" class="form-control">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" disabled type="button">Harga Satuan</button>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="sales_medicine" id="sales_medicine" class="form-control" aria-describedby="basic-addon1">
                                        <option value="">&mdash;Pilih Konsumen&mdash;</option>
                                        @foreach ($consumens as $consumen)
                                            <option value="{{ $consumen->id }}">{{ $consumen->nama_konsumen }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary" disabled type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="sales_medicine" id="sales_medicine" class="form-control" aria-describedby="basic-addon1">
                                        <option value="">&mdash;Pilih Dokter&mdash;</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->nama_dokter }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary" disabled type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <input type="number" class="form-control" value="1" aria-label="Username" aria-describedby="basic-addon1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-warning" disabled type="button">Tambah</button>
                                    </div>
                                </div>
                                <button class="btn btn-primary col col-md-12" type="submit"><i class="fa fa-print"></i> SELESAI</button>
                            </form>
                        </div>
                    </div>
                    <div class="col col-md-8" style="padding: 5px">
                        <div class="card col col-md-12">
                            <div class="row form-group" style="padding-top: 20px">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">TOTAL</label></div>
                                <div class="col col-md-12">
                                    <input type="number" id="text-input" name="sales_qty" placeholder="" class="form-control" value="10000">
                                </div>
                            </div>
                        </div>
                        <div class="card col col-md-12">
                            <div style="padding: 10px;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                    <tr style="font-size: 11px">
                                        <th>Nama Obat</th>
                                        <th>Tgl Kadaluarsa</th>
                                        <th>Harga Obat</th>
                                        <th>Kuantitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
