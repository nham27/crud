<?php

function connection(){
   return mysqli_connect('localhost','root','','student_db');
}

function query($query){
   $conn = connection();
   $result = mysqli_query($conn,$query);

   
   // kalau result lebih dari satu data
   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }
   return $rows;

   // kalau hasil hanya satu data
   if (mysqli_num_rows($result) == 1) {
      return mysqli_fetch_assoc($result);
    }
}

function tambah($data){
   $conn = connection();

   $nama = htmlspecialchars($data['nama']);
   $studentId = htmlspecialchars($data['studentId']);
   $gambar = htmlspecialchars($data['gambar']);
   $email = htmlspecialchars($data['email']);
   $kos = htmlspecialchars($data['kos']);

   $query = "INSERT INTO pelajar
    VALUES(null,'$nama','$studentId','$gambar','$email','$kos')";

   $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
//   echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function update($data){
   $conn = connection();

   $id=$data['id'];
   $nama = htmlspecialchars($data['nama']);
   $studentId = htmlspecialchars($data['studentId']);
   $gambar = htmlspecialchars($data['gambar']);
   $email = htmlspecialchars($data['email']);
   $kos = htmlspecialchars($data['kos']);

   $query="UPDATE pelajar 
   SET nama='$nama',studentId='$studentId',gambar='$gambar',email='$email',kos='$kos'
    WHERE id= $id";
   mysqli_query($conn,$query) or die(mysqli_error($conn));
   return mysqli_affected_rows($conn);
}

function delete($id){
   $conn = connection();
   $query = "DELETE FROM pelajar WHERE id=$id";
   $result = mysqli_query($conn,$query) or die(mysqli_error($conn));

   // echo mysqli_error($conn);
   $row = mysqli_affected_rows($conn);

   if($row > 0){
      echo "<script>
      alert('Data berjaya dibuang');
      document.location.href='index.php';
   </script>";
   }
   else{
   echo "<script>
      alert('data gagal dibuang');  
   </script>";
   // header('Location: index.php');
   // exit;
}
}

function search($keyword){
   $conn = connection();

   $query = "SELECT * FROM pelajar
    WHERE nama LIKE '%$keyword%'";
   $result = mysqli_query($conn,$query);

   $rows=[];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }
  return $rows;

  
}

