<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kas;
use App\pembelian;
use App\distributor;
use App\obat;
use Carbon;
use DB;

class PurchaseController extends Controller
{
    public $view = [
        "index" => "master.purchase.index",
        "add" => "master.purchase.add",
        "edit" => "master.purchase.edit"
    ];
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = new pembelian;
        $data["purchases"] = $purchase->select("pembelians.*", "obats.nama_obat", "obats.tgl_kadaluarsa", "obats.harga_beli", "distributors.nama_distributor")->join("obats", "pembelians.id_obat", "obats.id")->join("distributors", "pembelians.id_distributor", "distributors.id")->get();
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
            "purchase_medicine" => "required",
            "purchase_distributor" => "required",
            "purchase_date" => "required",
            "purchase_qty" => "required",
        ]);
        try {
            $selected_medicine = obat::findOrFail($request->input("purchase_medicine"));
            $medicine_price = $selected_medicine->harga_beli;
            $price = $request->purchase_qty * $medicine_price;

            $medicine_stock = $selected_medicine->stok;
            $stock = $medicine_stock + $request->input("purchase_qty");
            DB::beginTransaction();
            try {
                $selected_medicine->stok = $stock;
                $selected_medicine->save();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        } catch (\Exception $e) {
            return redirect()->route('purchase')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
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
    }
}
