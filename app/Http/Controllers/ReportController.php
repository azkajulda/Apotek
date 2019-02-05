<?php

namespace App\Http\Controllers;

use App\pembelian;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public $view = [
        "selectPembelian" => "master.report.selectDate_pembelian",
        "pembelian" => "master.report.laporan_pembelian",
        "penjualan" => "master.report.laporan_penjualan",
        "kas" => "master.report.laporan_kas"
    ];


    public function selectPembelian(){
        return view($this->view["selectPembelian"]);
    }

    public function reportPembelian(Request $request) {
        $validate = $request->validate([
            'first_date' => 'required',
            'last_date' => 'required',
        ]);

        $pembelian = new pembelian();

        $first_date = $request->first_date;
        $last_date = $request->last_date;

        $data = $pembelian->select("pembelians.*", "obats.nama_obat", "obats.tgl_kadaluarsa", "obats.harga_beli", "distributors.nama_distributor")
            ->join("obats", "pembelians.id_obat", "obats.id")
            ->join("distributors", "pembelians.id_distributor", "distributors.id")
            ->whereBetween("tanggal_pembelian",[$first_date,$last_date])->orderBy("tanggal_pembelian","desc")
            ->get();

//        dd($data);

        $jumlah=0;
        foreach ($data as $datas) {
            $jumlah+=($datas->harga_beli)*($datas->qty);
        }

//        dd($jumlah);
        return view($this->view['pembelian'], compact('jumlah','data','first_date','last_date'));
    }


}
