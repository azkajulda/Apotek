@extends('layouts.master')
@section('header')
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li class="active"><a href="#">Master Data</a></li>
                <li class="active"><a href="#">Data Apotek</a></li>
                <li class="active"><a href="#">Data Konsumen</a></li>
                <li class="active">Update Konsumen</li>
            </ol>
        </div>
    </div>
@endsection
@section('oontent')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Update</strong> Data Konsumen
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('updateKonsumen',$konsumen->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Konsumen</label></div>
                                    <div class="col-12 col-md-3"><input type="text" id="kode_konsumen" name="kode_konsumen" placeholder="" class="form-control" value="{{$konsumen->kode_konsumen}}"><small class="form-text text-muted">*Contoh : P102</small></div>
                                    @if ($errors->has('kode_konsumen'))
                                        <p style="color:#dc3545;font-size:15px;">{{ $errors->first('kode_konsumen') }}</p>
                                    @endif
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap Konsumen</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nama_konsumen" name="nama_konsumen" placeholder="" class="form-control" value="{{$konsumen->nama_konsumen}}"><small class="form-text text-muted">*Contoh : Ridwan Kusuma Perdana</small>
                                        @if ($errors->has('nama_konsumen'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('nama_konsumen') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Konsumen</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="type_konsumen" id="type_konsumen" class="form-control">
                                            <option value="" <?php if ("" == $konsumen->type_konsumen) echo 'selected'?> >&mdash;Pilih Jenis Konsumen&mdash;</option>
                                            <option value="Pelanggan" <?php if ("Pelanggan" == $konsumen->type_konsumen) echo 'selected'?>>Pelanggan</option>
                                            <option value="Pasien" <?php if ("Pasien" == $konsumen->type_konsumen) echo 'selected'?>>Pasien</option>
                                        </select>
                                        @if ($errors->has('type_konsumen'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('type_konsumen') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alamat</label></div>
                                    <div class="col-12 col-md-9"><textarea name="alamat" id="alamat" rows="3" placeholder="" class="form-control">{{$konsumen->alamat}}</textarea>
                                        @if ($errors->has('alamat'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('alamat') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telepon</label></div>
                                    <div class="col-12 col-md-3"><input type="number" id="telepon" name="telepon" placeholder="" class="form-control" value="{{$konsumen->telepon}}">
                                        @if ($errors->has('telepon'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('telepon') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class="form-control-label">Jenis Kelamin</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="jk" name="jk" value="Laki-Laki" <?php if ("Laki-Laki" == $konsumen->jk) echo 'checked'?> class="form-check-input">Laki-Laki
                                            </label>
                                            <label for="inline-radio2" class="form-check-label " style="margin-left: 10px">
                                                <input type="radio" id="jk" name="jk" value="Perempuan" <?php if ("Perempuan" == $konsumen->jk) echo 'checked'?> class="form-check-input">Perempuan
                                            </label>
                                        </div>
                                        @if ($errors->has('jk'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('jk') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Lahir</label></div>
                                    <div class="col-12 col-md-3"><input type="date" id="tgl_lahir" name="tgl_lahir"  placeholder="" value="{{$konsumen->tgl_lahir}}" class="form-control">
                                        @if ($errors->has('tgl_lahir'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('tgl_lahir') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pekerjaan</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="pekerjaan" name="pekerjaan" placeholder="" value="{{$konsumen->pekerjaan}}" class="form-control">
                                        @if ($errors->has('pekerjaan'))
                                            <p style="color:#dc3545;font-size:15px;">{{ $errors->first('pekerjaan') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Agama</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="agama" id="agama" class="form-control">
                                            <option value="" <?php if ("" == $konsumen->agama) echo 'selected'?>>&mdash;Pilih Agama&mdash;</option>
                                            <option value="Islam" <?php if ("Islam" == $konsumen->agama) echo 'selected'?>>Islam</option>
                                            <option value="Katolik" <?php if ("Katolik" == $konsumen->agama) echo 'selected'?>>Katolik</option>
                                            <option value="Protestan" <?php if ("Protestan" == $konsumen->agama) echo 'selected'?>>Protestan</option>
                                            <option value="Budha" <?php if ("Budha" == $konsumen->agama) echo 'selected'?>>Budha</option>
                                            <option value="Hindu" <?php if ("Hindu" == $konsumen->agama) echo 'selected'?>>Hindu</option>
                                            <option value="Khonghucu" <?php if ("Khonghucu" == $konsumen->agama) echo 'selected'?>>Khonghucu</option>
                                            <option value="Dll" <?php if ("Dll" == $konsumen->agama) echo 'selected'?>>Dll</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" value="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
