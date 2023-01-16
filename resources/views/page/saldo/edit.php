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
    <title>Form Ubah</title>
    <style>
        label,input{
            display: block;
        }

    </style>
</head>
<body>

        <h1> edit saldo</h1>
    <form action="" method="post">
        <label for="Jumlah_Saldo">jumlah saldo</label>
    <input type="text" name="Jumlah_Saldo" value="<?= $data['Jumlah_Saldo']?>" id="Jumlah_Saldo">
    <button type="submit" name="Ubah">Ubah</button>
    <button type="submit" name="list">
        <a href="dashboard.blade.php " target="_blank" >Daftar Saldo</a>
    </button>
    </form>  
    <?php
        if(isset($_POST["Ubah"])){
            $Jumlah_saldo  = $_POST['Jumlah_Saldo'] ;
            
            mysqli_query($conn, "UPDATE saldo SET WHERE id = $id");
            header("Location:dashboard.blade.php");
        }
?>
</body>
</html>
