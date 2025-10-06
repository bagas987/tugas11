<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    mysqli_query($conn, "UPDATE buku SET judul='$judul', stok=$stok, kategori='$kategori' WHERE id_buku=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Ubah Buku</title></head>
<body>
    <h2>Ubah Buku</h2>
    <form method="post">
        Judul: <input type="text" name="judul" value="<?= $data['judul'] ?>"><br>
        Stok: <input type="number" name="stok" value="<?= $data['stok'] ?>"><br>
        Kategori: <input type="text" name="kategori" value="<?= $data['kategori'] ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
