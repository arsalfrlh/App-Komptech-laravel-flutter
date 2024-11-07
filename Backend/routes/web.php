<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/barang',[BarangController::class,'index']);
Route::get('/barang/tambah',[BarangController::class,'tambah']);
Route::post('/barang/store',[BarangController::class,'store']);
Route::get('/barang/edit/{id_barang}',[BarangController::class,'edit']);
Route::put('/barang/update/{id_barang}',[BarangController::class,'update']);
Route::delete('/barang/hapus/{id_barang}',[BarangController::class,'hapus']);