<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head><title>Data Buku</title></head>
<body>
    <h2>Data Buku</h2>
    <a href="tambah.php">+ Tambah Buku</a> | 
    <a href="logout.php">Logout</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id_buku'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td><?= $row['kategori'] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id_buku'] ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row['id_buku'] ?>" onclick="return confirm('Hapus buku ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
