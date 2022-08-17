<?php

function connection(){
   return mysqli_connect('localhost','root','','student_db');
}

function query($query){
   $conn = connection();
   $result = mysqli_query($conn,$query);

   $rows=[];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }
   return $rows;
}

function tambah($data){
   $conn = connection();

   $nama = $data['nama'];
   $studentId = $data['studentId'];
   $gambar = $data['gambar'];
   $email = $data['email'];
   $kos = $data['kos'];

   $query = "INSERT INTO pelajar
    VALUES(null,'$nama','$studentId','$gambar','$email','$kos')";

   $result = mysqli_query($conn,$query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
   
}
function delete($id){
   $conn = connection();
   $query = "DELETE FROM pelajar WHERE id=$id";
   $result = mysqli_query($conn,$query);

   echo mysqli_error($conn);
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
   // exit();
}
}

