<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AddDataController extends Controller
{
    //
    public function index(){
        return view('tambahdata.index',[
            'active' => 'data penjualan'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bln_thn' => 'required|',
            'd_aktual' => 'required|numeric',
            // Tambahkan validasi untuk field lainnya
        ]);

        Penjualan::create($data);

        return redirect('/dataPenjualan')->with('successAdd', 'Data penjualan telah disimpan');
    }
}
