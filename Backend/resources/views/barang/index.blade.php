<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <h1 class="text-center mt-3">Daftar Barang</h1>
                <a href="/barang/tambah" class="btn btn-success mt-2">Tambah Data Barang</a>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    @foreach ($tampil as $barang)
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <div class="col mt-3" style="height: 100%">
                                <div class="card" style="width: 14rem;">
                                    <img class="card-img-top" src="{{ $barang->gambar }}" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">Merk: {{ $barang->merk }}</li>
                                      <li class="list-group-item">Stok: {{ $barang->stok }}</li>
                                      <li class="list-group-item"> Harga Rp: {{ $barang->harga }}</li>
                                    </ul>
                                    <div class="card-body">
                                      <a href="/barang/edit/{{ $barang->id_barang }}" class="btn btn-primary">Edit</a>
                                      <form action="/barang/hapus/{{ $barang->id_barang }}" method="POST" onsubmit="return confirm('Anda yakin akan menghapus data ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Hapus" class="btn btn-danger">
                                      </form>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>