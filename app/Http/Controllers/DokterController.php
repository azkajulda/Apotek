<?php

namespace App\Http\Controllers;

use App\dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function dokter()
    {
        $dokter = dokter::all();
        return view('master.dokter.index',compact('dokter'));
    }
    public function addDokter()
    {
        return view('master.dokter.add');
    }

    public function uploadDokter(Request $request)
    {
        $validate = $request->validate([
            'kode_dokter' => 'required',
            'nama_dokter' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',

        ]);

        $dokter = new dokter();
        try{
            $dokter->kode_dokter = $request->kode_dokter;
            $dokter->nama_dokter = $request->nama_dokter;
            $dokter->alamat = $request->alamat;
            $dokter->telepon = $request->telepon;
            $dokter->save();
        }catch (\Exception $exception){
            return redirect()->route('dokter')->with('alert','Data Harus terisi');
        }
        return redirect()->route('dokter')->with('success','Data Telah Masuk');
    }

    public function delete($id){
        $dokter = dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter')->with('delete','Data dokter '.$dokter->nama_dokter.' Telah Terhapus');
    }

    public function updateDokter(Request $request, $id)
    {
        $validate = $request->validate([
            'kode_dokter' => 'required',
            'nama_dokter' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $dokter = dokter::findOrFail($id);
        try{
            $dokter->kode_dokter = $request->kode_dokter;
            $dokter->nama_dokter = $request->nama_dokter;
            $dokter->alamat = $request->alamat;
            $dokter->telepon = $request->telepon;
            $dokter->save();
        }catch (\Exception $exception){
            return redirect()->route('dokter')->with('alert','Data Harus terisi');
        }
        return redirect()->route('dokter')->with('success','Data Telah diubah');
    }

    public function get_data_dokter($id)
    {
        $dokter = dokter::findOrFail($id);
        return view('master.dokter.edit',compact('dokter'));
    }
}
