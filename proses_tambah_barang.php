<?php
// proses_tambah_barang.php
include 'koneksi.php';

// Cek apakah formulir telah disubmit melalui metode POST
if ($_POST) {
    // Ambil data dari formulir
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO barang (nama_barang, kategori, harga, stok) VALUES (?, ?, ?, ?)");
    
    // Cek apakah prepared statement berhasil dibuat
    if ($stmt) {
        $stmt->bind_param("ssdi", $nama_barang, $kategori, $harga, $stok);
    
        // Jalankan statement dan cek keberhasilannya
        if ($stmt->execute()) {
            echo "Data barang berhasil ditambahkan!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Error saat menyiapkan statement: " . $conn->error;
    }
} else {
    // Bagian ini dijalankan jika halaman diakses langsung tanpa submit formulir
    echo "Tidak ada data yang dikirimkan.";
}

// Tutup koneksi database
$conn->close();
?>