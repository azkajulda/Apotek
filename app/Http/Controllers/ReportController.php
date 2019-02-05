<?php

namespace App\Http\Controllers;

use App\kas;
use App\pembelian;
use App\penjualan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public $view = [
        "selectPembelian" => "master.report.selectDate_pembelian",
        "pembelian" => "master.report.laporan_pembelian",
        "selectPenjualan" => "master.report.selectDate_penjualan",
        "penjualan" => "master.report.laporan_penjualan",
        "selectKas" => "master.report.selectDate_kas",
        "kas" => "master.report.laporan_kas"
    ];


    public function selectPembelian(){
        return view($this->view["selectPembelian"]);
    }

    public function reportPembelian(Request $request){
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
            ->whereBetween("tanggal_pembelian",[$first_date,$last_date])
            ->orderBy("tanggal_pembelian","desc")
            ->get();

        $jumlah=0;
        foreach ($data as $datas) {
            $jumlah+=($datas->harga_beli)*($datas->qty);
        }
        return view($this->view['pembelian'], compact('jumlah','data','first_date','last_date'));
    }

    public function selectPenjualan(){
        return view($this->view["selectPenjualan"]);
    }

    public function reportPenjualan(Request $request) {
        $validate = $request->validate([
            'first_date' => 'required',
            'last_date' => 'required',
        ]);

        $penjualan = new penjualan();

        $first_date = $request->first_date;
        $last_date = $request->last_date;

        $data = $penjualan->select("penjualans.*", "obats.nama_obat", "obats.tgl_kadaluarsa", "obats.harga_jual", "konsumens.nama_konsumen", "dokters.nama_dokter")
            ->join("obats", "penjualans.id_obat", "obats.id")
            ->join("konsumens", "penjualans.id_konsumen", "konsumens.id")
            ->join("dokters", "penjualans.id_dokter", "dokters.id")
            ->whereBetween("tanggal_penjualan",[$first_date,$last_date])
            ->orderBy("tanggal_penjualan","desc")
            ->get();

//        dd($data);

        $jumlah=0;
        foreach ($data as $datas) {
            $jumlah+=($datas->harga_jual)*($datas->qty);
        }

//        dd($jumlah);
        return view($this->view['penjualan'], compact('jumlah','data','first_date','last_date'));
    }

    public function selectKas(){
        return view($this->view["selectKas"]);
    }

    public function reportKas(Request $request){
        $validate = $request->validate([
            'first_date' => 'required',
            'last_date' => 'required',
        ]);

        $first_date = $request->first_date;
        $last_date = $request->last_date;

        $data = kas::all()->whereBetween("tanggal",[$first_date,$last_date]);

        $jumlah = $data->sum('nominal');
        return view($this->view['kas'], compact('jumlah','data','first_date','last_date'));
    }
}
