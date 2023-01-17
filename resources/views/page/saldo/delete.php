<?php
    include 'dashboard.php';
    $conn = mysqli_connect('localhost','root','','simukas');  
    $id = $_GET["id"];  
    mysqli_query ($koneksi,"DELETE FROM saldo WHERE id= $id");
    header("location:dashboard.blade.php")
?>