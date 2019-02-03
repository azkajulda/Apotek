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
   <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Penjualan  </strong>
                    </div>
                    <div class="card-body">
                        <a href="{{route('add-sell')}}">
                        <button class="btn btn-primary" style="margin-bottom: 15px;">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        </a>
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
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Tgl Kadaluarsa</th>
                                <th>Nama Konsumen</th>
                                <th>Harga Obat</th>
                                <th>Nama Dokter</th>
                                <th>Tgl Penjualan</th>
                                <th>Kuantitas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->nama_obat }}</td>
                                    <td>{{ $sale->tgl_kadaluarsa }}</td>
                                    <td>{{ $sale->nama_konsumen }}</td>
                                    <td>{{ "Rp. ".$sale->harga_jual.",-" }}</td>
                                    <td>{{ $sale->nama_dokter }}</td>
                                    <td>{{ $sale->tanggal_penjualan }}</td>
                                    <td>{{ $sale->qty }}</td>
                                    <td>
                                        <a href="{{ route('edit-sell', $sale->id) }}">
                                            <button type="button" class="btn btn-primary">
                                                <span class="fa fa-pencil"></span>
                                            </button>
                                        </a>
                                        <a href="{{ route('delete-sell', $sale->id) }}">
                                            <button type="button" class="btn btn-danger">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
    </div><!-- .content -->
@endsection
