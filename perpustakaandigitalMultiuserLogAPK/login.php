<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <style>
        body {
            background-color: #eaeaea;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #2d6ca2;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }

        a:hover {
            background-color: #1f4f78;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        input, button {
            padding: 8px;
            margin: 5px;
        }
    </style>
</head>

<body>

<h2>Data Peminjaman</h2>

<form method="POST" action="simpan_peminjaman.php">
    Nama: <input type="text" name="nama" value="<?= $_SESSION['nama']; ?>" readonly>
    Judul: <input type="text" name="judul" required>
    Tanggal: <input type="date" name="tanggal" required>
    <button type="submit">Simpan</button>
</form>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Judul</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>

<?php
$data = mysqli_query($conn, "SELECT * FROM peminjaman");
while($hasil = mysqli_fetch_array($data)){
?>
<tr>
    <td><?= $hasil['nama']; ?></td>
    <td><?= $hasil['judul']; ?></td>
    <td><?= $hasil['tanggal']; ?></td>
    <td>
        <a href="hapus_peminjaman.php?id=<?= $hasil['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
</tr>
<?php
}
?>

</table>

<a href="index.php">Kembali</a>

</body>
</html>
