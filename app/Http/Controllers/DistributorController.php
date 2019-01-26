<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\distributor;

class DistributorController extends Controller
{
    //
    public $view = [
        "index" => "master.distributor.index",
        "add" => "master.distributor.add"
    ];
    public function index(){
        return view($this->view["index"]);
    }

    public function add(){
        return view($this->view["add"]);
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
        $distributor = new distributor;
    }
}
