<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\distributor;
use App\obat;
use App\penerimaan_return;
use App\return_pembelian;
use DB;

class AcceptReturnController extends Controller
{
    public $view = [
        "index" => "master.return_accept.index",
        "add" => "master.return_accept.add",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $return_accept = new penerimaan_return;
        $return_accepts = $return_accept->select(
            "penerimaan_returns.*", 
            "obats.nama_obat", 
            "distributors.nama_distributor",
            "return_pembelians.tanggal_return"
        )
        ->join("obats", "penerimaan_returns.id_obat", "obats.id")
        ->join("distributors", "penerimaan_returns.id_distributor", "distributors.id")
        ->join("return_pembelians", "penerimaan_returns.id_return", "return_pembelians.id")
        ->get();
        $data["return_accepts"] = $return_accepts;
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
        $return_purchase = return_pembelian::where("returned", '=', false)->get();
        $data["medicines"] = $medicine;
        $data["distributors"] = $distributor;
        $data["return_purchases"] = $return_purchase;
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
            "accept_return_medicine" => "required",
            "accept_return_distributor" => "required",
            "accept_return_purchases" => "required",
            "accept_return_qty" => "required",
            "accept_return_date" => "required",
            "accept_return_caption" => "required",
        ]);
        try {
            $selected_medicine = obat::findOrFail($request->accept_return_medicine);
            $medicine_stock = $selected_medicine->stok;
            $stock = $medicine_stock + $request->accept_return_qty;
            DB::beginTransaction();
            try {
                $accept_return = new penerimaan_return;
                $accept_return->id_obat = $request->accept_return_medicine;
                $accept_return->id_distributor = $request->accept_return_distributor;
                $accept_return->id_return = $request->accept_return_purchases;
                $accept_return->qty = $request->accept_return_qty;
                $accept_return->tanggal_penerimaan = $request->accept_return_date;
                $accept_return->keterangan = $request->accept_return_caption;
                $accept_return->save();

                $selected_medicine->stok = $stock;
                $selected_medicine->save();

                $return_purchase = return_pembelian::findOrFail($request->accept_return_purchases);
                $return_purchase->returned = true;
                $return_purchase->save();

            } catch (\Exception $e) {
                dd($e->getMessage());
                DB::rollBack();
                return redirect()->route('accept-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
            }
            DB::commit();
            return redirect()->route('accept-return')->with('success', 'Data Telah Masuk');
        } catch (\Exception $e) {
            return redirect()->route('accept-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
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
        try {
            $accept_return = penerimaan_return::findOrFail($id);
            $accept_return->delete();
            return redirect()->route('accept-return')->with('delete', 'Data Return Penerimaan pada tanggal '.$accept_return->tanggal_penerimaan.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('accept-return')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
    }
}
