@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Return Pembelian</a></li>
                <li class="active">Data Return Pembelian</li>
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
                        <strong class="card-title">Data Return Pembelian  </strong>
                    </div>
                    <div class="card-body">
                        <a href="{{route('add-accept-return')}}">
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
                                <th>Nama Distributor</th>
                                <th>Kuantitas</th>
                                <th>Tgl Return</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($return_accepts as $return_accept)
                                <tr>
                                    <td>{{ $return_accept->nama_obat }}</td>
                                    <td>{{ $return_accept->nama_distributor }}</td>
                                    <td>{{ $return_accept->qty }}</td>
                                    <td>{{ $return_accept->tanggal_penerimaan }}</td>
                                    <td>
                                        <a href="{{ route('edit-accept-return', $return_accept->id) }}">
                                            <button type="button" class="btn btn-primary">
                                                <span class="fa fa-pencil"></span>
                                            </button>
                                        </a>
                                        <a href="{{ route('delete-accept-return', $return_accept->id) }}">
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
