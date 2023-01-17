<?php
    include 'master.php';
    $conn = mysqli_connect('localhost','root','','simukas');  
    $id = $_GET["id"];  
    mysqli_query ($koneksi,"DELETE FROM saldo WHERE id= $id");
    header("location:master.php")
?>