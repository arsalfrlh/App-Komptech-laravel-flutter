import 'package:flutter/material.dart'; //untuk mengimport flutter
import 'package:android/screens/homepage.dart'; //untuk mengakses folder "screens" dan file "homepage.dart"

//flutter main memulai flutter
void main() {
  runApp(const MyApp()); // Menambahkan 'const' pada MyApp
}

class MyApp extends StatelessWidget {
  const MyApp({
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      // Menambahkan 'const' pada MaterialApp
      title: 'KompTech', // properti title seperti h1 di html
      home:
          HomePage(), // properti home | widget HomePage isinya di folder "screens" dan file "homepage.dart"
    );
  }
}
