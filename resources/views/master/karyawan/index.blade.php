@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Karyawan</a></li>
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
                            <strong class="card-title">Data Karyawan</strong>
                        </div>
                        <div class="card-body">
                            <a href="{{route('addKaryawan')}}">
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
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($karyawan as $karyawans)
                                <tr>
                                    <td>{{$karyawans->kode_karyawan}}</td>
                                    <td>{{$karyawans->nama_karyawan}}</td>
                                    <td>{{$karyawans->jabatan}}</td>
                                    <td>
                                        <a href="{{route('deleteKaryawan',$karyawans->id)}}}">
                                            <button class="btn btn-danger" style="width: 40px;"><i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('editKaryawan',$karyawans->id)}}">
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
