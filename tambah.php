<?php
include 'functions.php';
if(isset($_POST['tambah'])){
   if(tambah($_POST) > 0){
    echo "<script>
        alert('Data berjaya ditambah');
        document.location.href='index.php';
    </script>";
   }
   else{
    echo "<script>
        alert('data gagal ditambah');  
    </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelajar</title>
</head>
<body>
    <h1>Daftar Pelajar</h1>
    <form action="" method="POST">
        <li>
            <label for="nama">Nama : 
                <input type="text" name="nama" autofocus>
            </label>
        </li>
        <li>
            <label for="studentId">No Matrik :
                <input type="text" name="studentId">
            </label>
        </li>
        <li>
            <label for="email" >Email :
                <input type="text" name="email">
            </label>
        </li>
        <li>
            <label for="kos">kos:
                <input type="text" name="kos">
            </label>
        </li>
        <li>
            <label for="gambar">Gambar :
                <input type="text" name="gambar">
            </label>
        </li>
        <li>
            <button type="submit" name="tambah">Tambah</button>
        </li>
    </form>
</body>
</html>