@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Obat</a></li>
                <li class="active">Data Obat</li>
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
                        <strong class="card-title">Data Obat  </strong>
                    </div>
                    <div class="card-body">
                        <a href="{{route('add-medicine')}}">
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
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Produsen Obat</th>
                                <th>Kategori</th>
                                <th>Jenis Obat</th>
                                <th>Tgl Kadaluarsa</th>
                                <th>Stok</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicines as $medicine)
                                    <tr>
                                        <td>{{ $medicine->kode_obat }}</td>
                                        <td>{{ $medicine->nama_obat }}</td>
                                        <td>{{ $medicine->nama_pabrik }}</td>
                                        <td>{{ $medicine->kategori }}</td>
                                        <td>{{ $medicine->jenis_obat }}</td>
                                        <td>{{ $medicine->tgl_kadaluarsa }}</td>
                                        <td>{{ $medicine->stok }}</td>
                                        <td>{{ "Rp.".$medicine->harga_beli.",-" }}</td>
                                        <td>{{ "Rp.".$medicine->harga_jual.",-" }}</td>
                                        <td>
                                            <a href="{{ route('edit-medicine', $medicine->id) }}">
                                                <button type="button" class="btn btn-primary">
                                                    <span class="fa fa-pencil"></span>
                                                </button>
                                            </a>
                                            <a href="{{ route('delete-medicine', $medicine->id) }}">
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
