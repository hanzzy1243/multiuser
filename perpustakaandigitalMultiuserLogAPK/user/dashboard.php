<?php 
session_start();

if($_SESSION['level'] != "user"){
    header("Location: ../login.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
 </head>
 <body>
    <h2>DASHBOARD USER</h2>
    <p>Selamat Datang, <?php echo $_SESSION['username']; ?></p>

    <ul>
        <li><a href="">Lihat Buku</a></li>
        <li><a href="">Pinjam Buku</a></li>
        <li><a href="">Riwayat Peminjaman</a></li>
    </ul>

    <a href="../logout.php">Logout disini!</a>
 </body>
 </html>