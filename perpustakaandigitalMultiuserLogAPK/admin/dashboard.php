<?php 
session_start();

if($_SESSION['level'] != "admin"){
    header("Location: ../login.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
 </head>
 <body>
    <h2>DASHBOARD ADMIN</h2>
    <p>Selamat Datang, <?php echo $_SESSION['username']; ?></p>

    <ul>
        <li><a href="">Kelola Buku</a></li>
        <li><a href="">Kelola User</a></li>
        <li><a href="">Data Peminjaman</a></li>
    </ul>

    <a href="../logout.php">Logout disini!</a>
 </body>
 </html>