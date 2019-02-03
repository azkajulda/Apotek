<?php

namespace App\Http\Controllers;

use App\kas;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function kas()
    {

        $kas = kas::all();
        $sum = kas::all()->sum('nominal');
        return view('master.kas.index',compact('kas','sum'));
    }

    public function addKas()
    {
        return view('master.kas.add');
    }

    public function uploadKas(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required',
        ]);

        $kas = new kas();
        try{
            $kas->tanggal = $request->tanggal;
            $kas->keterangan = $request->keterangan;
            $kas->nominal = $request->nominal;
//            dd($kas);
            $kas->save();

        }catch (\Exception $exception){
            return redirect()->route('kas')->with('alert','Data Harus terisi');
        }
        return redirect()->route('kas')->with('success','Data Telah Masuk');
    }

    public function delete($id){
        $kas = kas::findOrFail($id);
        $kas->delete();

        return redirect()->route('kas')->with('delete','Data kas '.$kas->keterangan.' Telah Terhapus');
    }

    public function updateKas(Request $request, $id)
    {
        $validate = $request->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required',
        ]);

        $kas = kas::findOrFail($id);
        try{
            $kas->tanggal= $request->tanggal;
            $kas->keterangan = $request->keterangan;
            $kas->nominal = $request->nominal;
            $kas->save();
        }catch (\Exception $exception){
            return redirect()->route('kas')->with('alert','Data Harus terisi');
        }
        return redirect()->route('kas')->with('success','Data Telah diubah');
    }

    public function get_data_kas($id)
    {
        $kas = kas::findOrFail($id);
        return view('master.kas.edit',compact('kas'));
    }
}
