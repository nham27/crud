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

function delete($id){
   $conn = connection();
   $query = "DELETE FROM pelajar WHERE id=$id";
   $result = mysqli_query($conn,$query);

   echo mysqli_error($conn);
   return header('Location: index.php');
   exit();
  
}

