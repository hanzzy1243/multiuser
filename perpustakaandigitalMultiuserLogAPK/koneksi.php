<?php
$conn = mysqli_connect("localhost", "root", "", "perpustakaan_digital");

if(!$conn){
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>