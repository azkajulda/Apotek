<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\distributor;

class DistributorController extends Controller
{
    //
    public $view = [
        "index" => "master.distributor.index",
        "add" => "master.distributor.add",
        "edit" => "master.distributor.edit",
    ];
    public function index(){
        $data["distributors"] = distributor::all();
        // dd($data["distributors"]);
        return view($this->view["index"], $data);
    }

    public function add(){
        return view($this->view["add"]);
    }

    private function checkDistributor($kode_distributor, $id){
        $distributor = distributor::where('kode_distributor', '=', $kode_distributor)->get()->first();
        if (!empty($distributor)) {
            if ($distributor->id != $id) {
                return true;
            }
            return true;
        }else{
            return false;
        }
    }

    public function store(Request $request) {
        $validator = $request->validate([
            "distributor_code" => "required",
            "distributor_name" => "required",
            "distributor_address" => "required",
            "distributor_city" => "required",
            "distributor_phone" => "required",
            "distributor_account" => "required",
            "distributor_email" => "required"
        ]);
        try {
            $check = $this->checkDistributor($request->input('distributor_code'));
            if($check) {
                return redirect()->route('distributor')->with('alert', "Kode Distributor yang anda masukan sudah tersedia, mohon isi dengan kode distributor yang lainnya.");
            }
            $distributor = new distributor;
            $distributor->kode_distributor = $request->input('distributor_code');
            $distributor->nama_distributor = $request->input('distributor_name');
            $distributor->alamat = $request->input('distributor_address');
            $distributor->kota = $request->input('distributor_city');
            $distributor->telepon = $request->input('distributor_phone');
            $distributor->no_rek = $request->input('distributor_account');
            $distributor->Email = $request->input('distributor_email');
            $distributor->save();
        } catch (\Exception $e) {
            return redirect()->route('distributor')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
        return redirect()->route('distributor')->with('success', 'Data Telah Masuk');
    }

    public function edit($id){
        try {
            $distributors = distributor::where("id", '=', $id)->get();
            $data["distributors"] = $distributors;
            return view($this->view["edit"], $data);
        } catch (\Exception $e) {
            $data["error"] = $e->getMessage();
            return view($this->view["edit"], $data);
        }
    }

    public function update($id, Request $request){
        $validator = $request->validate([
            "distributor_code" => "required",
            "distributor_name" => "required",
            "distributor_address" => "required",
            "distributor_city" => "required",
            "distributor_phone" => "required",
            "distributor_account" => "required",
            "distributor_email" => "required"
        ]);
        try {
            $check = $this->checkDistributor($request->input('distributor_code'), $id);
            if($check) {
                return redirect()->route('distributor')->with('alert', "Kode Distributor yang anda masukan sudah tersedia, mohon isi dengan kode distributor yang lainnya.");
            }
            $distributor = distributor::findOrFail($id);
            $distributor->kode_distributor = $request->input('distributor_code');
            $distributor->nama_distributor = $request->input('distributor_name');
            $distributor->alamat = $request->input('distributor_address');
            $distributor->kota = $request->input('distributor_city');
            $distributor->telepon = $request->input('distributor_phone');
            $distributor->no_rek = $request->input('distributor_account');
            $distributor->Email = $request->input('distributor_email');
            $distributor->save();

        } catch (\Exception $e) {
            return redirect()->route('distributor')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
        return redirect()->route('distributor')->with('success', 'Data Telah Berhasil Diubah');
    }

    public function delete($id){
        try {
            $distributor = distributor::findOrFail($id);
            $distributor->delete();
            return redirect()->route('distributor')->with('delete', 'Data Distributor '.$distributor->nama_distributor.' berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('distributor')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
    }
}
