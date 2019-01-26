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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
