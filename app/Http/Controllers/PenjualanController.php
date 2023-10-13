<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\Alpha;

class PenjualanController extends Controller
{
    public function index(){
        $penjualan = Penjualan::all();
        
        $alpha = Alpha::first();
        

        return view('penjualan.index', [
            'active' => 'data penjualan'
        ],compact('penjualan', 'alpha'));
    }

    public function editData(Penjualan $penjualan){
        return view('editData.index',[
            'title' => 'Edit Data Penjualan',
            'penjualan' => $penjualan,
            'active' => 'data penjualan'
        ]);
    }

    public function update(Request $request,$id)
    {
        $penjualan = Penjualan::find($id);
        if (!$penjualan) {
            // Handle the case where the record is not found, e.g., show an error message or redirect
            return redirect('/dataPenjualan')->with('error', 'Data Penjualan tidak ditemukan.');
        }
        // $penjualan = new Penjualan;

        $penjualan->id = $request->id;
        $penjualan->bln_thn = $request->bln_thn;
        $penjualan->d_aktual = $request->d_aktual;

        $penjualan->update();

        return redirect('/dataPenjualan')->with('successUpdate', 'Data Penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return redirect('/dataPenjualan')->with('error', 'Data Penjualan tidak ditemukan.');
        }

        $penjualan->delete();

        return redirect('/dataPenjualan')->with('successDelete', 'Data Penjualan berhasil dihapus.');
    }
}
