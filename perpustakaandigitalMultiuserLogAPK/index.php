<?php
include 'koneksi.php';

$anggota = mysqli_query($conn, "SELECT * FROM anggota");
$buku = mysqli_query($conn, "SELECT * FROM buku");
?>

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
</style>

<h2>Data Peminjaman</h2>

<form method="POST" action="simpan_peminjaman.php">
    
    Nama:
    <select name="id_anggota" required>
        <option value="">-- Pilih Anggota --</option>
        <?php while($a = mysqli_fetch_array($anggota)) { ?>
            <option value="<?= $a['id']; ?>">
                <?= $a['nama']; ?>
            </option>
        <?php } ?>
    </select>

    Judul Buku:
    <select name="id_buku" required>
        <option value="">-- Pilih Buku --</option>
        <?php while($b = mysqli_fetch_array($buku)) { ?>
            <option value="<?= $b['id']; ?>">
                <?= $b['judul']; ?>
            </option>
        <?php } ?>
    </select>

    Tanggal:
    <input type="date" name="tanggal" required>

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
$data = mysqli_query($conn, "
    SELECT peminjaman.*, anggota.nama, buku.judul 
    FROM peminjaman
    JOIN anggota ON peminjaman.id_anggota = anggota.id
    JOIN buku ON peminjaman.id_buku = buku.id
");

while($hasil = mysqli_fetch_array($data)){
?>
<tr>
    <td><?= $hasil['nama']; ?></td>
    <td><?= $hasil['judul']; ?></td>
    <td><?= $hasil['tanggal']; ?></td>
    <td>
        <a href="hapus_peminjaman.php?id=<?= $hasil['id']; ?>">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<a href="index.php">Kembali</a>
