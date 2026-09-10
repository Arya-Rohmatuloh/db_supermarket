<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
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
            box-sizing: border-box; /* Ensures padding doesn't affect total width */
        }
        button[type="submit"] {
            width: 100%;
            background-color: #5cb85c;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Barang Baru</h2>
        <form method="POST" action="proses_tambah_barang.php">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" required>

            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" step="0.01" required>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" required>

            <button type="submit">Tambah Barang</button>
        </form>
        <a href="tampil_barang.php" class="back-link">Kembali ke Daftar Barang</a>
    </div>
</body>
</html>