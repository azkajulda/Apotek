@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Distrbutor</a></li>
                <li class="active">Data Distributor</li>
            </ol>
        </div>
    </div>
@endsection
@section('oontent')
   <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Distrbutor  </strong>
                    </div>
                    <div class="card-body">
                        <a href="{{route('add-distributor')}}">
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
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Telepon</th>
                                <th>No Rekening</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach ($distributors as $distributor)
                                    <td>{{ $distributor->kode_distributor }}</td>
                                    <td>{{ $distributor->nama_distributor }}</td>
                                    <td>{{ $distributor->alamat }}</td>
                                    <td>{{ $distributor->kota }}</td>
                                    <td>{{ $distributor->telepon }}</td>
                                    <td>{{ $distributor->no_rek }}</td>
                                    <td>{{ $distributor->Email }}</td>
                                    <td>
                                        <a href="{{ route('edit-distributor', $distributor->id) }}">
                                            <button type="button" class="btn btn-primary">
                                                <span class="fa fa-pencil"></span>
                                            </button>
                                        </a>
                                        <a href="">
                                            <button type="button" class="btn btn-danger">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </a>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
    </div><!-- .content -->
@endsection
