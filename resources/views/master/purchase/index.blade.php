@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Pembelian</a></li>
                <li class="active">Data Pembelian</li>
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
                        <strong class="card-title">Data Pembelian  </strong>
                    </div>
                    <div class="card-body">
                        <a href="{{route('add-purchase')}}">
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
                                <th>Nama Distributor</th>
                                <th>Harga Obat</th>
                                <th>Tgl Pembelian</th>
                                <th>Kuantitas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->nama_obat }}</td>
                                    <td>{{ $purchase->tgl_kadaluarsa }}</td>
                                    <td>{{ $purchase->nama_distributor }}</td>
                                    <td>{{ "Rp. ".$purchase->harga_beli.",-" }}</td>
                                    <td>{{ $purchase->tanggal_pembelian }}</td>
                                    <td>{{ $purchase->qty }}</td>
                                    <td>
                                        <a href="{{ route('edit-purchase', $purchase->id) }}">
                                            <button type="button" class="btn btn-primary">
                                                <span class="fa fa-pencil"></span>
                                            </button>
                                        </a>
                                        <a href="{{ route('delete-purchase', $purchase->id) }}">
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
