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
                            <form action="{{ route('store-medicine') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Obat</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="medicine_code" placeholder="" class="form-control"><small class="form-text text-muted">*Contoh : O102</small>
                                        @if ($errors->has('medicine_code'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_code') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Produsen</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="medicine_produsen" id="medicine_produsen" class="form-control">
                                            <option value="">&mdash;Pilih Produsen&mdash;</option>
                                            @foreach ($producens as $producen)
                                                <option value="{{ $producen->id }}">{{ $producen->nama_pabrik }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('medicine_produsen'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_produsen') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Obat</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="text" id="text-input" name="medicine_name" placeholder="" class="form-control">
                                        @if ($errors->has('medicine_name'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori Obat</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="medicine_category" id="medicine_category" class="form-control">
                                            <option value="">&mdash;Pilih Kategori&mdash;</option>
                                            @foreach ($medicine_categories as $category)
                                                <option value="{{ $category["name"] }}">{{ $category["name"] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('medicine_category'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_category') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Obat</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="medicine_type" id="medicine_type" class="form-control">
                                            <option value="">&mdash;Pilih Jenis Obat&mdash;</option>
                                            @foreach ($medicine_type as $type)
                                                <option value="{{ $type["name"] }}">{{ $type["name"] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('medicine_type'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tgl Kadaluarsa</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="date" id="text-input" name="medicine_ex" placeholder="" class="form-control">
                                        @if ($errors->has('medicine_ex'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_ex') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Beli</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="number" id="text-input" name="medicine_buy_price" placeholder="" class="form-control">
                                        @if ($errors->has('medicine_buy_price'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_buy_price') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Jual</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="number" id="text-input" name="medicine_sell_price" placeholder="" class="form-control">
                                        @if ($errors->has('medicine_sell_price'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_sell_price') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Stok</label></div>
                                    <div class="col-12 col-md-3">
                                        <input type="number" id="text-input" name="medicine_stock" placeholder="" class="form-control">
                                        @if ($errors->has('medicine_stock'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('medicine_stock') }}</p>
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
