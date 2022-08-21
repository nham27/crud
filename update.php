<?php
include 'functions.php';

// kembalikan user ke index.php, kalau takdak id
if(!isset($_GET['id'])){
    return header('Location:index.php');
    exit();
}

$id = $_GET['id'];
$student = query("SELECT * FROM pelajar WHERE id=$id");

if(isset($_POST['update'])){
   if(update($_POST) > 0){
    echo "<script>
    alert('data berjaya dikemaskini');
    document.location.href='index.php';
    </script>";
   }
   else {
    echo "<script>
    alert('data gagal dikemaskini');
    document.location.href='index.php';
    </script>";
   }
}

// }
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
    <h1>Kemaskini Maklumat Pelajar</h1>
    <form action="" method="POST">
        <?php foreach($student as $std): ?>
            <input type="hidden" value="<?=$std['id'];?>">
            <input type="hidden" value="<?=$std['studentId'];?>">
        <li>
            <label for="nama">Nama : 
                <input type="text" name="nama" autofocus value="<?=$std['nama'];?>" >
            </label>
        </li>
        <li>
            <label for="studentId">No Matrik :
                <?=$std['studentId'];?>
            </label>
        </li>
        <li>
            <label for="email" >Email :
                <input type="text" name="email" value="<?=$std['email'];?>">
            </label>
        </li>
        <li>
            <label for="kos">kos:
                <input type="text" name="kos" value="<?=$std['kos'];?>">
            </label>
        </li>
        <li>
            <label for="gambar">Gambar :
                <input type="text" name="gambar" value="<?=$std['gambar'];?>">
            </label>
        </li>
        <li>
            <button type="submit" name="update">Kemaskini</button>
        </li>
        <?php endforeach;?>
        </form>
</body>
</html>