<?php
    $koneksi = mysqli_connect('localhost','root','','simukas');  
    $id = $_GET["id"];  
    mysqli_query ($konek,"DELETE FROM saldo WHERE id= $id");
    header("location:index.blade.php")
?>