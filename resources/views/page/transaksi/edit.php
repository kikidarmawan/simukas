<?php
    $koneksi = mysqli_connect("localhost","root","","simukas");
    $id = $_GET["id"];
    $kueri = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id=$id");
    $data = mysqli_fetch_assoc($kueri);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
    <style>
        label,input{
            display: block;
        }

    </style>
</head>
<body>

        <h1> edit transaksi</h1>
    <form action="" method="post">
        <label for="Jumlah_saldo">saldo</label>
    <input type="text" name="Jumlah_saldo" value="<?= $data['Jumlah_saldo']?>" id="Jumlah_saldo">
    <button type="submit" name="edit">Edit</button>
    <button type="submit" name="list">
        <a href="index.blade.php " target="_blank" >jumlah saldo</a>
    </button>
    </form>  
    <?php
        if(isset($_POST["edit"])){
            $Jumlah_saldo  = $_POST['Jumlah_Saldo'] ;

            mysqli_query($koneksi, "UPDATE saldo SET WHERE id = $id");
            header("Location:dashboard.blade.php");
        }
?>
</body>
</html>