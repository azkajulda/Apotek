<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produsen;

class ProdusenController extends Controller
{
    public $view = [
        "index" => "master.produsen.index",
        "add" => "master.produsen.add",
        "edit" => "master.produsen.edit"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produsen = produsen::all();
        $data["produsens"] = $produsen;
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
        return view($this->view["add"]);
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
            "produsen_name" => "required",
            "produsen_address" => "required",
            "produsen_phone" => "required",
        ]);
        try {
            $produsen = new produsen;
            $produsen->nama_pabrik = $request->input('produsen_name');
            $produsen->alamat = $request->input('produsen_address');
            $produsen->telepon = $request->input('produsen_phone');
            $produsen->save();
        } catch (\Exception $e) {
            return redirect()->route('produsen')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
        return redirect()->route('produsen')->with('success', 'Data Telah Masuk');
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
        $produsen = produsen::findOrFail($id);
        $data["produsens"] = $produsen;
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
            "produsen_name" => "required",
            "produsen_address" => "required",
            "produsen_phone" => "required",
        ]);
        try {
            $produsen = produsen::findOrFail($id);
            $produsen->nama_pabrik = $request->input('produsen_name');
            $produsen->alamat = $request->input('produsen_address');
            $produsen->telepon = $request->input('produsen_phone');
            $produsen->save();
        } catch (\Exception $e) {
            return redirect()->route('produsen')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
        return redirect()->route('produsen')->with('success', 'Data Telah Berhasil Diubah');
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
            $produsen = produsen::findOrFail($id);
            $produsen->delete();
            return redirect()->route('produsen')->with('delete', 'Data Produsen '.$produsen->nama_pabrik.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('produsen')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
    }
}
