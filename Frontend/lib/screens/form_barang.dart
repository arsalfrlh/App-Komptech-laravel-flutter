import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class FormBarang extends StatefulWidget {
  final Map<String, dynamic>? item;
  const FormBarang({super.key, this.item});

  @override
  _FormBarangState createState() => _FormBarangState();
}

class _FormBarangState extends State<FormBarang> {
  final TextEditingController namaController = TextEditingController();
  final TextEditingController merkController = TextEditingController();
  final TextEditingController stokController = TextEditingController();
  final TextEditingController hargaController = TextEditingController();
  final TextEditingController gambarController = TextEditingController();

  String get apiUrl => widget.item == null
      ? 'http://10.0.2.2:8000/api/barang/store' //api tambah barang
      : 'http://10.0.2.2:8000/api/barang/update/${widget.item!['id_barang']}'; //api update barang

  @override
  void initState() {
    super.initState();
    if (widget.item != null) {
      namaController.text = widget.item!['nama_barang'];
      merkController.text = widget.item!['merk'];
      stokController.text = widget.item!['stok'].toString();
      hargaController.text = widget.item!['harga'].toString();
      gambarController.text = widget.item!['gambar'];
    }
  }

  Future<void> submitData() async {
    final response = widget.item == null
        ? await http.post(
            Uri.parse(apiUrl),
            headers: {"Content-Type": "application/json"},
            body: jsonEncode({
              "namabarang": namaController.text, //array key
              "merk": merkController.text, //array key
              "stok": int.tryParse(stokController.text),
              "harga": double.tryParse(hargaController.text),
              "gambar": gambarController.text,
            }),
          )
        : await http.put(
            Uri.parse(apiUrl),
            headers: {"Content-Type": "application/json"},
            body: jsonEncode({
              "namabarang": namaController.text, //array key
              "merk": merkController.text, //array key
              "stok": int.tryParse(stokController.text),
              "harga": double.tryParse(hargaController.text),
              "gambar": gambarController.text,
            }),
          );

    if (response.statusCode == 200) {
      Navigator.pop(context);
    } else {
      print("Gagal menyimpan data");
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.item == null ? 'Tambah Barang' : 'Edit Barang'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            TextField(
              controller: namaController,
              decoration: const InputDecoration(labelText: 'Nama Barang'),
            ),
            TextField(
              controller: merkController,
              decoration: const InputDecoration(labelText: 'Merk'),
            ),
            TextField(
              controller: stokController,
              decoration: const InputDecoration(labelText: 'Stok'),
              keyboardType: TextInputType.number,
            ),
            TextField(
              controller: hargaController,
              decoration: const InputDecoration(labelText: 'Harga'),
              keyboardType: TextInputType.number,
            ),
            TextField(
              controller: gambarController,
              decoration: const InputDecoration(labelText: 'URL Gambar'),
            ),
            const SizedBox(height: 20),
            ElevatedButton(
              onPressed: submitData,
              child: const Text('Simpan'),
            ),
          ],
        ),
      ),
    );
  }
}
