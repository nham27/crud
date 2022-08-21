<?php
include 'functions.php';
$id = ($_GET['id']);
$students = query("SELECT * FROM pelajar WHERE id=$id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maklumat Pelajar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Maklumat Pelajar</h3>
            <?php foreach($students as $s):?>
            <div class="col">
                <ul>
                    <li><img src="img/<?= $s['gambar'];?>"></li>
                    <li>Nama:<?= $s['nama'];?></li>
                    <li>Student id:<?= $s['studentId'];?></li>
                    <li>email:<?= $s['email'];?></li>
                    <li>kos: <?= $s['kos'];?></li>
                    <li><a href="update.php?id=<?=$s['id'];?>">Update |</a>
                   <a href="delete.php?id=<?= $s['id'];?>" onclick="return confirm('Hapus data?');">Delete</a>
                </li>
                 
                    <li><a href="index.php">kembali</a></li>
                </ul>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>