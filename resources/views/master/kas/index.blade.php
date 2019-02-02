@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Kas</a></li>
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
                            <strong class="card-title">Data Kas Apotek</strong>
                        </div>
                        <div class="card-body">
                            <a href="{{route('addKas')}}">
                                <button class="btn btn-primary" style="margin-bottom: 15px;">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                                <p style="font-weight: bold; font-size: 20px; margin-left: 80%">Jumlah Kas Apotek {{' Rp.'.number_format($sum,2)}}</p>
                                <br>
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
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Total Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kas as $kass)
                                    <tr>
                                        <td>{{$kass->tanggal}}</td>
                                        <td>{{$kass->keterangan}}</td>
                                        <td>{{' Rp.'.number_format($kass->nominal,2)}}</td>
                                        <td>
                                            <a href="{{route('deleteKas',$kass->id)}}}">
                                                <button class="btn btn-danger" style="width: 40px;"><i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('editKas',$kass->id)}}">
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