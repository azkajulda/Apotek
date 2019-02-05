<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\distributor;
use App\obat;
use App\return_pembelian;
use DB;

class PurchaseReturnController extends Controller
{
    public $view = [
        "index" => "master.return_purchase.index",
        "add" => "master.return_purchase.add",
        "edit" => "master.return_purchase.edit",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchase_return = new return_pembelian;
        $purchase_returns = $purchase_return->select(
            "return_pembelians.*", 
            "obats.nama_obat", 
            "distributors.nama_distributor"
        )->join("obats", "return_pembelians.id_obat", "obats.id")->join("distributors", "return_pembelians.id_distributor", "distributors.id")->get();
        $data["return_purchases"] = $purchase_returns;
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
        $distributor = distributor::all();
        $data["medicines"] = $medicine;
        $data["distributors"] = $distributor;
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
            "purchase_return_medicine" => "required",
            "purchase_return_distributor" => "required",
            "purchase_return_qty" => "required",
            "purchase_return_date" => "required",
            "purchase_return_caption" => "required",
        ]);
        try {
            $selected_medicine = obat::findOrFail($request->purchase_return_medicine);

            $medicine_stock = $selected_medicine->stok;
            if ($request->purchase_return_qty > $medicine_stock ||  $medicine_stock < 0) {
                return redirect()->route('purchase-return')->with('delete', 'Maaf, stok obat kurang dari yang dibutuhkan, mohon melakukan pembelian obat.');
            }
            $stock = $medicine_stock - $request->purchase_return_qty;
            DB::beginTransaction();
            try {
                $purchase_return = new return_pembelian;
                $purchase_return->id_obat = $request->purchase_return_medicine;
                $purchase_return->id_distributor = $request->purchase_return_distributor;
                $purchase_return->qty = $request->purchase_return_qty;
                $purchase_return->tanggal_return = $request->purchase_return_date;
                $purchase_return->keterangan = $request->purchase_return_caption;
                $purchase_return->save();

                $selected_medicine->stok = $stock;
                $selected_medicine->save();

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('purchase-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
            }
            DB::commit();
            return redirect()->route('purchase-return')->with('success', 'Data Telah Masuk');
        } catch (\Exception $e) {
            return redirect()->route('purchase-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
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
        $distributor = distributor::all();
        $data["medicines"] = $medicine;
        $data["distributors"] = $distributor;
        $purchase_return = return_pembelian::findOrFail($id);
        $data["purchase_returns"] = $purchase_return;
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
            "purchase_return_medicine" => "required",
            "purchase_return_distributor" => "required",
            "purchase_return_qty" => "required",
            "purchase_return_date" => "required",
            "purchase_return_caption" => "required",
        ]);
        try {
            $selected_medicine = obat::findOrFail($request->purchase_return_medicine);
            $purchase_return = return_pembelian::findOrFail($id);
            $medicine_stock = $selected_medicine->stok;
            $stock = $medicine_stock - 0;
            if ($request->purchase_return_qty < $purchase_return->qty || $request->purchase_return_qty > $purchase_return->qty) {
                $medicine_stock = $selected_medicine->stok + $purchase_return->qty;
                if ($request->purchase_return_qty > $medicine_stock ||  $medicine_stock < 0) {
                    return redirect()->route('purchase-return')->with('delete', 'Maaf, stok obat kurang dari yang dibutuhkan, mohon melakukan pembelian obat.');
                }
                $stock = $medicine_stock - $request->purchase_return_qty;
            }
            DB::beginTransaction();
            try {
                $purchase_return->id_obat = $request->purchase_return_medicine;
                $purchase_return->id_distributor = $request->purchase_return_distributor;
                $purchase_return->qty = $request->purchase_return_qty;
                $purchase_return->tanggal_return = $request->purchase_return_date;
                $purchase_return->keterangan = $request->purchase_return_caption;
                $purchase_return->save();

                $selected_medicine->stok = $stock;
                $selected_medicine->save();

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('purchase-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
            }
            DB::commit();
            return redirect()->route('purchase-return')->with('success', 'Data Telah Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('purchase-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
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
            $purchase_return = return_pembelian::findOrFail($id);
            $purchase_return->delete();
            return redirect()->route('purchase-return')->with('delete', 'Data Return Pembelian pada tanggal '.$purchase_return->tanggal_return.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('purchase-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
    }
}
