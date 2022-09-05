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
    WHERE nama LIKE '%$keyword%'
    OR studentId LIKE '%$keyword%' 
    OR email LIKE '%$keyword%' 
    OR kos LIKE '%$keyword%'";
   $result = mysqli_query($conn,$query);

   $rows=[];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }
  return $rows;
}



function signUp($data){
   $conn = connection();

   $username = htmlspecialchars($data['username']);
   $password1 = mysqli_real_escape_string($conn, $data['password1']);
   $password2  =mysqli_real_escape_string($conn, $data['password2']);


   // jika username/ password kosong
   if(empty($username) || empty($password1) || empty($password2)){
      echo "<script>
      alert('username/password kosong');
      document.location.href = 'signUp.php';
      </script>";
      return false;
   }

   // jika username sudah ada
   if(query("SELECT * FROM user WHERE username = '$username'")){
      echo "<script>
         alert('username telah di daftarkan!');
         document.location.href='signUp.php';
      </script>";
      return false;
   }
   
   // jika password tidak sama
   if($password1 !== $password2){
      echo "
      <script>
      alert('password kedua tidak sama');
      document.location.href='signUp.php';
      </script>";
      return false;
   }

   // jika password kurang 5 digit
   if(strlen($password1) < 5){
      echo "
      <script>
      alert('password terlalu pendek!');
      document.location.href='signUp.php';
      </script>
      ";
      return false;
   }

   // jika password dan username match
   // encrypt password
   $passwordBaru = password_hash($password1,PASSWORD_DEFAULT);
   
   // insert ke table login
   $query = "INSERT INTO user VALUES(null, '$username','$passwordBaru')";
   mysqli_query($conn,$query) or die(mysqli_error($conn));
   return mysqli_affected_rows($conn);

}

function login($data){
   $conn = connection();

   $username = htmlspecialchars($data['username']);
   $password = htmlspecialchars($data['password']);

   $query = "SELECT * FROM user WHERE username = '$username'";
   $result = mysqli_query($conn,$query);

   // cek username
   if(mysqli_num_rows($result) == 1){

      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password,$row['password'])){
          $_SESSION['login'] = true;
         header("Location:index.php");
         exit;
      }
   }
      return [
         'error' => true,
         'mesej' => 'Username / Password Salah!'
       ];
   
}
