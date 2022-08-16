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

