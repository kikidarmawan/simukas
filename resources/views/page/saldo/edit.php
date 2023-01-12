<?php
    $koneksi = mysqli_connect("localhost","root","","simukas");
    $id = $_GET["id"];
    $kueri = mysqli_query($koneksi, "SELECT * FROM user WHERE id=$id");
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

        <h1> edit user</h1>
    <form action="" method="post">
        <label for="Nama_User">Nama user</label>
    <input type="text" name="Nama_User" value="<?= $data['nama_user']?>" id="Nama_User">
    <button type="submit" name="edit">Edit</button>
    <button type="submit" name="list">
        <a href="index.blade.php " target="_blank" >Daftar User</a>
    </button>
    </form>  
    <?php
        if(isset($_POST["edit"])){
            $nama_User  = $_POST['Nama_User'] ;
            
            mysqli_query($koneksi, "UPDATE User SET WHERE id = $id");
            header("Location:index.blade.php");
        }
?>
</body>
</html>
