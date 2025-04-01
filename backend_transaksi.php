<?php
include 'koneksi.php'; // Panggil koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST['id_barang'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'] . ", " . $_POST['kecamatan'] . ", " . $_POST['kota'] . ", " . $_POST['provinsi'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Hitung total harga
    $total_harga = $jumlah * $harga;
    
    // Simpan ke tabel transaksi
    $query = "INSERT INTO transaksi (id_barang, nama_pembeli, telepon, email, alamat, jumlah, total_harga, created_at) 
              VALUES ('$id_barang', '$nama_pembeli', '$telepon', '$email', '$alamat', '$jumlah', '$total_harga', NOW())";

    if ($conn->query($query) === TRUE) {
        $id_transaksi = $conn->insert_id; // Ambil ID transaksi terbaru
        header("Location: invoice.php?id=$id_transaksi"); // Redirect ke invoice
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
