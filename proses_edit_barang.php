<?php
// proses_edit_barang.php
include 'koneksi.php';

// Check if the form was submitted via POST
if ($_POST) {
    // Get the data from the form
    $id_barang = $_POST['id_barang_lama'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Use a prepared statement for security
    $stmt = $conn->prepare("UPDATE barang SET nama_barang=?, kategori=?, harga=?, stok=? WHERE id_barang=?");
    
    // Check if the statement was prepared successfully
    if ($stmt) {
        $stmt->bind_param("ssdis", $nama_barang, $kategori, $harga, $stok, $id_barang);
    
        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Data barang berhasil diperbarui! <br>";
            echo "<a href='tampil_barang.php'>Kembali ke daftar</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    // This part runs if the page is accessed directly without form submission
    echo "Tidak ada data yang dikirim.";
}

// Close the database connection
$conn->close();
?>