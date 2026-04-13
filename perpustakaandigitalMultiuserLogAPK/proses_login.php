<?php 
session_start();
include 'koneksi.php';

$username = $_POST ['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE username= '$username' AND  password='$password'");
$data = mysqli_fetch_assoc($query);

if($data){
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    if($data['level'] == "admin"){
        header("Location: admin/dashboard.php");
    }else{
        header("Location: user/dashboard.php");
    }
    
    
}else{
    echo "login gagal!";
}
 ?>