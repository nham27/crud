<?php
// connection to db
$conn = mysqli_connect('localhost','root','','student_db');
// query table
$result = mysqli_query($conn,"SELECT * FROM pelajar");
// change data to array

$rows = [];
while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}

$student = $rows;
// simpan ke dlm varaible
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
    </div>
    <div class="row">
        <table>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>gambar</th>
                <th>No Pelajar</th>
                <th>Email</th>
                <th>Kos</th>
                <th>Action</th>
            </tr>

            <?php  $i=1; 
            foreach($student as $std): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $std['nama'];?></td>
                <td><img src="img/<?= $std['gambar'];?>"></td>
                <td><?= $std['studentId'];?></td>               
                <td><?= $std['email'];?></td>
                <td><?= $std['kos'];?></td>
                <td><a href="">Detail</a></td>
                
            </tr>
        <?php endforeach;?>
        </table>
       
    </div>
</div>

</body>
</html>