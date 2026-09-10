<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
// edit_barang.php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    
    $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<div class="form-container">
    <h2>Edit Data Barang</h2>
    <form method="POST" action="proses_edit_barang.php">
        <input type="hidden" name="id_barang_lama" value="<?php echo $row['id_barang']; ?>">
        
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>

        <label for="kategori">Kategori:</label>
        <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" required>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="<?php echo $row['harga']; ?>" step="0.01" required>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required>

        <button type="submit">Update Data</button>
    </form>
    <a href="tampil_barang.php" class="back-link">Kembali ke Daftar Barang</a>
</div>

<?php
    } else {
        echo "<p class='no-data'>Data barang tidak ditemukan.</p>";
    }
} else {
    echo "<p class='no-data'>ID barang tidak tersedia.</p>";
}

$conn->close();
?>

</body>
</html>