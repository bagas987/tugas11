<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    $query = "INSERT INTO buku (judul, stok, kategori) VALUES ('$judul', $stok, '$kategori')";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Tambah Buku</title></head>
<body>
    <h2>Tambah Buku</h2>
    <form method="post">
        Judul: <input type="text" name="judul"><br>
        Stok: <input type="number" name="stok"><br>
        Kategori: <input type="text" name="kategori"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
