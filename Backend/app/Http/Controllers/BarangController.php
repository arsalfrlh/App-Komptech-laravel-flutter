<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        //menampilkan semua data pada model barang
        $barang = Barang::all();
        return view('barang.index',['tampil' => $barang]);
    }

    public function tambah(){
        return view('barang.tambah');
    }

    public function store(Request $request){
        //menambahkan data pada tbl_barang dengan model Barang|all name form dan nama colom tabel harus sesuai
        Barang::create($request->all()); //request dari form tambah
        return redirect('/barang');
    }

    public function edit($id){
        $barang = Barang::where('id_barang',$id)->get();
        return view('barang.edit',[ 'tampil' => $barang ]);
    }

    public function update(Request $request,$id){
        Barang::where('id_barang',$id)->update([
            'gambar' => $request->gambar,
            'nama_barang' => $request->nmbarang,
            'merk' => $request->merk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
        return redirect('/barang');
    }

    public function hapus($id){
        Barang::where('id_barang',$id)->delete();
        return redirect('/barang');
    }
}
