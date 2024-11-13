<?php
include'Connection.php';



 $deleteId= $_GET['id'];

 $sql = "DELETE FROM `user-info` WHERE id='$deleteId'";
 $query =mysqli_query($conn,$sql);
 if($query){
    header('location:index.php');
   
 }else{
   echo "Are You one to delete";
 }


?>