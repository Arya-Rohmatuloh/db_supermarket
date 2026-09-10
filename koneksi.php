<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_supermarket";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengatur charset untuk mendukung karakter bahasa Indonesia
$conn->set_charset("utf8");
?>