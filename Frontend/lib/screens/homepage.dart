import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'form_barang.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final String url = 'http://10.0.2.2:8000/api/barang';
  List<dynamic> items = [];

  Future<void> fetchData() async {
    final response = await http.get(Uri.parse(url));
    if (response.statusCode == 200) {
      setState(() {
        items = json.decode(response.body)['data'];
      });
    } else {
      print("Gagal memuat data");
    }
  }

  Future<void> hapusBarang(int id) async {
    final response = await http.delete(Uri.parse('$url/hapus/$id'));
    if (response.statusCode == 200) {
      fetchData();
    } else {
      print("Gagal menghapus data");
    }
  }

  @override
  void initState() {
    super.initState();
    fetchData();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Center(child: Text('KompTech')),
      ),
      body: ListView.builder(
        itemCount: items.length,
        itemBuilder: (context, index) {
          final item = items[index];
          return ListTile(
            leading: Image.network(item['gambar']),
            title: Text(item['nama_barang']),
            subtitle: Text('Harga: ${item['harga']}'),
            trailing: Row(
              mainAxisSize: MainAxisSize.min,
              children: [
                IconButton(
                  icon: const Icon(Icons.edit),
                  onPressed: () async {
                    await Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (context) => FormBarang(item: item),
                      ),
                    );
                    fetchData();
                  },
                ),
                IconButton(
                  icon: const Icon(Icons.delete),
                  onPressed: () {
                    hapusBarang(item['id_barang']);
                  },
                ),
              ],
            ),
          );
        },
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () async {
          await Navigator.push(
            context,
            MaterialPageRoute(builder: (context) => const FormBarang()),
          );
          fetchData();
        },
        child: const Icon(Icons.add),
      ),
    );
  }
}
