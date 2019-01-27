<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obat;
use App\produsen;

class MedicineController extends Controller
{

    public $view = [
        "index" => "master.medicine.index",
        "add" => "master.medicine.add",
        "edit" => "master.medicine.edit"
    ];

    public $medicine_categories = [
        [
            "code" =>"obat_bebas",
            "name" => "Obat Bebas"
        ],
        [
            "code" => "obat_bebas_terbatas",
            "name" => "Obat Bebas Terbatas"
        ],
        [
            "code" => "obat_keras",
            "name" => "Obat Keras"
        ],
        [
            "code" => "jamu",
            "name" => "Jamu(Bebasis herbal)"
        ],
        [
            "code" => "standard_herbal",
            "name" => "Obat Herbal Terstandar"
        ],
        [
            "code" => "fitofarmaka",
            "name" => "Fitofarmaka(Berbasis klinik)"
        ]
    ];

    public $medicine_type = [
        [
            "code" => "tablet",
            "name" => "Obat Tablet"
        ],
        [
            "code" => "pulvis",
            "name" => "Obat Berbentuk Serbuk"
        ],
        [
            "code" => "pil",
            "name" => "Obat Berbentuk Pil"
        ],
        [
            "code" => "capsule",
            "name" => "Obat Berbentuk Kapsul"
        ],
        [
            "code" => "caplet",
            "name" => "Obat Berbentuk Kaplet"
        ],
        [
            "code" => "syrup",
            "name" => "Obat Berbentuk Larutan"
        ],
        [
            "code" => "suspensi",
            "name" => "Obat Berbentuk suspensi"
        ],
        [
            "code" => "salep",
            "name" => "Obat Berbentuk Salep"
        ],
        [
            "code" => "suppositoria",
            "name" => "Obat Berbentuk Suppositoria"
        ],
        [
            "code" => "cair_tetes",
            "name" => "Obat Berbentuk Cair Tetes"
        ],
        [
            "code" => "injection",
            "name" => "Obat Berbentuk Injeksi(suntik)"
        ]
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicine = new produsen;
        $medicines = $medicine->with('produsens')->join('obats', 'obats.id_produsen', '=', 'produsens.id')->get();
        $data["medicines"] = $medicines;
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
        $producens = produsen::all();
        $data["producens"] = $producens;
        $data["medicine_categories"] = $this->medicine_categories;
        $data["medicine_type"] = $this->medicine_type;
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
            "medicine_code" => "required",
            "medicine_produsen" => "required",
            "medicine_name" => "required",
            "medicine_category" => "required",
            "medicine_type" => "required",
            "medicine_ex" => "required",
            "medicine_buy_price" => "required",
            "medicine_sell_price" => "required",
            "medicine_stock" => "required" 

        ]);
        try {
            $check = $this->checkMedicine($request->input("medicine_code"));
            if ($check) {
                return redirect()->route('medicine')->with('alert', "Kode Obat yang anda masukan sudah tersedia, mohon isi dengan kode obat yang lainnya.");
            }
            $medicine = new obat;
            $medicine->kode_obat = $request->input("medicine_code");
            $medicine->id_produsen = $request->input("medicine_produsen");
            $medicine->nama_obat = $request->input("medicine_name");
            $medicine->kategori = $request->input("medicine_category");
            $medicine->jenis_obat = $request->input("medicine_type");
            $medicine->tgl_kadaluarsa = $request->input("medicine_ex");
            $medicine->harga_beli = $request->input("medicine_buy_price");
            $medicine->harga_jual = $request->input("medicine_sell_price");
            $medicine->stok = $request->input("medicine_stock");

            $medicine->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('medicine')->with('alert', "Maaf terjadi kesalahan di server, mohon coba sesaat lagi.");
        }
        return redirect()->route('medicine')->with('success', 'Data Telah Masuk');
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
        $medicine = obat::findOrFail($id);
        $data["medicines"] = $medicine;
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

    private function checkMedicine($medicine_code){
        $medicine = obat::where('kode_obat', "=", $medicine_code)->get()->first();
        if (!empty($medicine)) {
            return true;
        }
        return false;
    }
}
