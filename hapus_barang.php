<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM barang WHERE id_barang = ?");
    $stmt->bind_param("i", $id_barang);

    if ($stmt->execute()) {
        echo "Data barang dengan ID " . $id_barang . " berhasil dihapus!";
        echo "<script>
            setTimeout(function(){
                window.location.href = 'tampil_barang.php';
            }, 2000);
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>