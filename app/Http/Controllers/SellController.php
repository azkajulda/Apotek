<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\penjualan;
use App\obat;
use App\dokter;
use App\konsumen;
use App\kas;
use DB;

class SellController extends Controller
{
    public $view = [
        "index" => "master.sell.index",
        "add" => "master.sell.add",
        "edit" => "master.sell.edit"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sell = new penjualan;
        $data["sales"] = $sell->select("penjualans.*", "obats.nama_obat", "obats.tgl_kadaluarsa", "obats.harga_jual", "konsumens.nama_konsumen", "dokters.nama_dokter")->join("obats", "penjualans.id_obat", "obats.id")->join("konsumens", "penjualans.id_konsumen", "konsumens.id")->join("dokters", "penjualans.id_dokter", "dokters.id")->get();
        return view($this->view["index"], $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $medicine = obat::all();
        $consumen = konsumen::all();
        $doctor = dokter::all();
        $data["medicines"] = $medicine;
        $data["consumens"] = $consumen;
        $data["doctors"] = $doctor;
        return view($this->view["add"], $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            "sales_medicine" => "required",
            "sales_consument" => "required",
            "sales_doctor" => "required",
            "sales_date" => "required",
            "sales_qty" => "required"
        ]);
        try {
            $selected_medicine = obat::findOrFail($request->sales_medicine);
            $medicine_price = $selected_medicine->harga_jual;
            $price = $request->sales_qty * $medicine_price;
            $medicine_stock = $selected_medicine->stok;
            if ($request->sales_qty > $medicine_stock ||  $medicine_stock < 0) {
                return redirect()->route('sell')->with('delete', 'Maaf, stok obat kurang dari yang dibutuhkan, mohon melakukan pembelian obat.');
            }
            $stock = $medicine_stock - $request->sales_qty;
            DB::beginTransaction();
            try {
                $sales = new penjualan;
                $sales->id_obat = $request->sales_medicine;
                $sales->id_konsumen = $request->sales_consument;
                $sales->id_dokter = $request->sales_doctor;
                $sales->tanggal_penjualan = $request->sales_date;
                $sales->qty = $request->sales_qty;
                $sales->save();
                
                $selected_medicine->stok = $stock;
                $selected_medicine->save();

                $kas = new kas;
                $kas->id_penjualan = $sales->id;
                $kas->tanggal = $request->sales_date;
                $kas->keterangan = "Penjualan Obat ".$selected_medicine->nama_obat." Sebanyak ".$request->sales_qty;
                $kas->nominal = $price;
                $kas->save();
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('sell')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
            }
            DB::commit();
            return redirect()->route('sell')->with('success', 'Data Telah Masuk');
        } catch (\Exception $e) {
            return redirect()->route('sell')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $medicine = obat::all();
        $consumen = konsumen::all();
        $doctor = dokter::all();
        $data["medicines"] = $medicine;
        $data["consumens"] = $consumen;
        $data["doctors"] = $doctor;
        $sale = penjualan::findOrFail($id);
        $data["sales"] = $sale;
        return view($this->view["edit"], $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = $request->validate([
            "sales_medicine" => "required",
            "sales_consument" => "required",
            "sales_doctor" => "required",
            "sales_date" => "required",
            "sales_qty" => "required"
        ]);
        try {
            $selected_medicine = obat::findOrFail($request->sales_medicine);
            $medicine_price = $selected_medicine->harga_jual;
            $price = $request->sales_qty * $medicine_price;

            $medicine_stock = $selected_medicine->stok;
            if ($request->sales_qty > $medicine_stock ||  $medicine_stock < 0) {
                return redirect()->route('sell')->with('delete', 'Maaf, stok obat kurang dari yang dibutuhkan, mohon melakukan pembelian obat.');
            }
            $stock = $medicine_stock - $request->sales_qty;
            DB::beginTransaction();
            try {
                $sales = penjualan::findOrFail($id);
                $sales->id_obat = $request->sales_medicine;
                $sales->id_konsumen = $request->sales_consument;
                $sales->id_dokter = $request->sales_doctor;
                $sales->tanggal_penjualan = $request->sales_date;
                $sales->qty = $request->sales_qty;
                $sales->save();
                
                $selected_medicine->stok = $stock;
                $selected_medicine->save();

                $kas = kas::where("id_penjualan", "=", $id)->get()->first();
                $kas->id_penjualan = $sales->id;
                $kas->tanggal = $request->sales_date;
                $kas->keterangan = "Penjualan Obat ".$selected_medicine->nama_obat." Sebanyak ".$request->sales_qty;
                $kas->nominal = $price;
                $kas->save();
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('sell')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
            }
            DB::commit();
            return redirect()->route('sell')->with('success', 'Data Telah Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('sell')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $sales = penjualan::findOrFail($id);
            $sales->delete();
            return redirect()->route('sell')->with('delete', 'Data Penjualan pada tanggal '.$sales->tanggal_penjualan.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('sell')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
    }
}
