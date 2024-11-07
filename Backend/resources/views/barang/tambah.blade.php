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
    <div class="container">
        <h1 class="text-center mt-3">Tambah Data Barang</h1>
        <form action="/barang/store" method="POST" class="mt-5">
            @csrf
            <div class="row">
              <div class="col">
                <label for="inputEmail4">Gambar URL</label>
                <input type="text" class="form-control" placeholder="Gambar URL..." name="gambar">
              </div>
              <div class="col">
                <label for="inputEmail4">Nama Barang</label>
                <input type="text" class="form-control" placeholder="Nama Barang..." name="nama_barang">
              </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="inputEmail4">Merk</label>
                  <input type="text" class="form-control" placeholder="Merk Barang..." name="merk">
                </div>
                <div class="col">
                    <label for="inputEmail4">Stok</label>
                  <input type="number" class="form-control" placeholder="Stok Barang..." name="stok">
                </div>
                <div class="col">
                    <label for="inputEmail4">Harga</label>
                  <input type="number" class="form-control" placeholder="Harga Barang..." name="harga">
                </div>
              </div>
              <div class="row mt-3">
                  <input type="submit" class="btn btn-success mr-2 ml-3" value="Simpan">
                  <a href="/barang" class="btn btn-danger">Kembali</a>
              </div>
          </form>
    </div>
</body>
</html>