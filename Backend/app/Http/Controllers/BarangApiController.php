<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangApiController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return response()->json(['pesan' => 'berhasil menampilkan data', 'data'=> $barang]);
    }

    public function store(Request $request){
        $barang = Barang::create([
            'gambar' => $request->gambar, //array key
            'nama_barang' => $request->namabarang, //array key
            'merk' => $request->merk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]); //request dari form tambah
        return response()->json([ 'pesan' => 'berhasil menambahkan data', 'data' => $barang ]);
    }

    public function edit($id){
        $barang = Barang::where('id_barang',$id)->first();
        return response()->json([ 'pesan' => 'berhasil menampilkan data', 'data' => $barang ]);
    }
    
    public function update(Request $request,$id){
        $barang = Barang::where('id_barang',$id)->update([
            'gambar' => $request->gambar, //array key
            'nama_barang' => $request->namabarang, //array key
            'merk' => $request->merk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
        return response()->json([ 'pesan' => 'berhasil mengupdate data', 'data' => $barang ]);
    }

    public function hapus($id){
        $barang = Barang::where('id_barang',$id)->delete();
        response()->json([ 'pesan' => 'Behasil Hapus data', 'data' => $barang ]);
    }
}
