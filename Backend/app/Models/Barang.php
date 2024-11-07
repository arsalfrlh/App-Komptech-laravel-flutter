<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    //file model Barang membaca tabel tbl_barang bukan tabel barangs
    protected $table = "tbl_barang";

    //kolom yang tidak boleh di isi
    protected $guarded = ['id_barang'];
    //tidak menggunakan waktu membuat dan mengupdate
    public $timestamps = false;

    protected $fillable = ['gambar','nama_barang','merk','stok','harga'];
}
