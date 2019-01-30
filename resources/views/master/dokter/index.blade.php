@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Dokter</a></li>
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
                            <strong class="card-title">Data Dokter</strong>
                        </div>
                        <div class="card-body">
                            <a href="{{route('addDokter')}}">
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
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dokter as $dokters)
                                    <tr>
                                        <td>{{$dokters->kode_dokter}}</td>
                                        <td>{{$dokters->nama_dokter}}</td>
                                        <td>{{$dokters->alamat}}</td>
                                        <td>{{$dokters->telepon}}</td>
                                        <td>
                                            <a href="{{route('deleteDokter',$dokters->id)}}}">
                                                <button class="btn btn-danger" style="width: 40px;"><i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('editDokter',$dokters->id)}}">
                                                <button class="btn btn-primary" style="width: 40px;"><i class="fa fa-pencil"></i>
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
