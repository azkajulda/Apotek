<?php

namespace App\Http\Controllers;

use App\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function karyawan()
    {
        $karyawan = karyawan::paginate(10);
        return view('master.karyawan.index',compact('karyawan'));
    }
    public function addKaryawan()
    {
        return view('master.karyawan.add');
    }

    public function uploadKaryawan(Request $request)
    {
        $validate = $request->validate([
            'kode_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
        ]);

        $karyawan = new karyawan();
        try{
            $karyawan->kode_karyawan = $request->kode_karyawan;
            $karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->jabatan = $request->jabatan;
            $karyawan->save();
        }catch (\Exception $exception){
            return redirect()->route('karyawan')->with('alert','Data Harus terisi');
        }
        return redirect()->route('karyawan')->with('success','Data Telah Masuk');
    }

    public function delete($id){
        $karyawan = karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan')->with('delete','Data Karyawan '.$karyawan->nama_karyawan.' Telah Terhapus');
    }

    public function updateKaryawan(Request $request, $id)
    {
        $validate = $request->validate([
            'kode_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
        ]);

        $karyawan = karyawan::findOrFail($id);
        try{
            $karyawan->kode_karyawan = $request->kode_karyawan;
            $karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->jabatan = $request->jabatan;
            $karyawan->save();
        }catch (\Exception $exception){
            return redirect()->route('karyawan')->with('alert','Data Harus terisi');
        }
        return redirect()->route('karyawan')->with('success','Data Telah diubah');
    }

    public function get_data_karywan($id)
    {
        $karyawan = karyawan::findOrFail($id);
        return view('master.karyawan.edit',compact('karyawan'));
    }
}
