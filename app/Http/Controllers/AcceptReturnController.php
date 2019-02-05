<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\distributor;
use App\obat;
use App\penerimaan_return;

class AcceptReturnController extends Controller
{
    public $view = [
        "index" => "master.return_accept.index",
        "add" => "master.return_accept.add",
        "edit" => "master.return_accept.edit",
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
            "distributors.nama_distributor"
        )->join("obats", "penerimaan_returns.id_obat", "obats.id")->join("distributors", "penerimaan_returns.id_distributor", "distributors.id")->get();
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
            "accept_return_medicine" => "required",
            "accept_return_distributor" => "required",
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
                $accept_return->qty = $request->accept_return_qty;
                $accept_return->tanggal_penerimaan = $request->accept_return_date;
                $accept_return->keterangan = $request->accept_return_caption;
                $accept_return->save();

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
