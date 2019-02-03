@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active">Data Konsumen</li>
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
                        <strong class="card-title">Data Konsumen</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{route('addKonsumen')}}">
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
                                <th>Jenis</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Pekerjaan</th>
                                <th>Agama</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($konsumen as $konsumens)
                            <tr>
                                <td>{{$konsumens->kode_konsumen}}</td>
                                <td>{{$konsumens->nama_konsumen}}</td>
                                <td>{{$konsumens->type_konsumen}}</td>
                                <td>{{$konsumens->alamat}}</td>
                                <td>{{$konsumens->telepon}}</td>
                                <td>{{$konsumens->jk}}</td>
                                <td>{{$konsumens->tgl_lahir}}</td>
                                <td>{{$konsumens->pekerjaan}}</td>
                                <td>{{$konsumens->agama}}</td>
                                <td>
                                    <a href="{{url('konsumen/delete/'.$konsumens->id)}}">
                                        <button class="btn btn-danger" style="width: 40px;"><i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('editKonsumen',$konsumens->id)}}">
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
