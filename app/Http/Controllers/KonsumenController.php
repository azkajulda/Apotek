<?php

namespace App\Http\Controllers;

use App\konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function konsumen()
    {
        $konsumen = konsumen::all();
        return view('master.konsumen.konsumen',compact('konsumen'));
    }
    public function addKonsumen()
    {
        return view('master.konsumen.addsKonsumen');
    }

    public function uploadKonsumen(Request $request)
    {
        $validate = $request->validate([
            'kode_konsumen' => 'required',
            'nama_konsumen' => 'required',
            'type_konsumen' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
        ]);

        $konsumen = new konsumen();
        try{
            $konsumen->kode_konsumen = $request->kode_konsumen;
            $konsumen->nama_konsumen = $request->nama_konsumen;
            $konsumen->type_konsumen = $request->type_konsumen;
            $konsumen->alamat = $request->alamat;
            $konsumen->telepon = $request->telepon;
            $konsumen->jk = $request->jk;
            $konsumen->tgl_lahir = $request->tgl_lahir;
            $konsumen->pekerjaan = $request->pekerjaan;
            $konsumen->agama = $request->agama;
            $konsumen->save();
        }catch (\Exception $exception){
            return redirect()->route('konsumen')->with('alert','Data Harus terisi');
        }
        return redirect()->route('konsumen')->with('success','Data Telah Masuk');
    }

    public function delete($id){
        $konsumen = konsumen::findOrFail($id);
        $konsumen->delete();

        return redirect()->route('konsumen')->with('delete','Data Konsumen '.$konsumen->nama_konsumen.' Telah Terhapus');
    }

    public function updateKonsumen(Request $request, $id)
    {
        $validate = $request->validate([
            'kode_konsumen' => 'required',
            'nama_konsumen' => 'required',
            'type_konsumen' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
        ]);

        $konsumen = konsumen::findOrFail($id);
        try{
            $konsumen->kode_konsumen = $request->kode_konsumen;
            $konsumen->nama_konsumen = $request->nama_konsumen;
            $konsumen->type_konsumen = $request->type_konsumen;
            $konsumen->alamat = $request->alamat;
            $konsumen->telepon = $request->telepon;
            $konsumen->jk = $request->jk;
            $konsumen->tgl_lahir = $request->tgl_lahir;
            $konsumen->pekerjaan = $request->pekerjaan;
            $konsumen->agama = $request->agama;
            $konsumen->save();
        }catch (\Exception $exception){
            return redirect()->route('konsumen')->with('alert','Data Harus terisi');
        }
        return redirect()->route('konsumen')->with('success','Data Telah diubah');
    }

    public function get_data_konsumen($id)
    {
        $konsumen = konsumen::findOrFail($id);
        return view('master.konsumen.updateKonsumen',compact('konsumen'));
    }
}
