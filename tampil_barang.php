<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang Supermarket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .add-button:hover {
            background-color: #4cae4c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-links a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .no-data {
            text-align: center;
            color: #888;
            font-style: italic;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Barang Supermarket</h2>
    <a href="form_tambah_barang.php" class="add-button">Tambah Barang Baru</a>

    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM barang ORDER BY nama_barang ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>Nama Barang</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama_barang"] . "</td>";
            echo "<td>" . $row["kategori"] . "</td>";
            echo "<td>" . $row["harga"] . "</td>";
            echo "<td>" . $row["stok"] . "</td>";
            echo "<td class='action-links'>";
            echo "<a href='edit_barang.php?id=" . $row["id_barang"] . "'>Edit</a> | ";
            echo "<a href='hapus_barang.php?id=" . $row["id_barang"] . "' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='no-data'>Tidak ada data barang.</p>";
    }

    $conn->close();
    ?>

</div>

</body>
</html>