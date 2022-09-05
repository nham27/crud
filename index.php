<?php
// start session
session_start();
if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit;
}

// connection to db
include 'functions.php';
$students = query("SELECT * FROM pelajar");

if(isset($_POST['cari'])){
    $students = search($_POST['keyword']);
   
}
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
        <h1>Maklumat Pelajar</h1>

        <a href="logout.php">Log Out</a>
    </div>

        <form action="" method="POST">
                <input type="text" name="keyword" size="40" autocomplete="off" autofocus placeholder="masukkan pencarian..">
                <button type="submit" name="cari">SEARCH</button>
        </form>
        
  
    <div class="row">
        <a href="tambah.php">Daftar Pelajar</a>
       
        <table>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>gambar</th>
                <th>Action</th>
            </tr>
                <?php if(empty($students)) : ?>
                   <tr>
                    <td colspan="4">Tiada Maklumat</td>
                   </tr>
                <?php endif; ?>
                    
            <?php  $i=1; 
            foreach($students as $std) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $std['nama'];?></td>
                <td><img src="img/<?= $std['gambar'];?>"></td>    
                <td><a href="detail.php?id=<?= $std['id']; ?>">Detail</a></td>
                
            </tr>
        <?php endforeach;?>
        </table>
       
    </div>
</div>

</body>
</html>