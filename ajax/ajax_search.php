<?php
include '../functions.php';

$students = search($_GET['keyword']);
?>

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