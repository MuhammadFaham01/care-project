
<?php
include 'db.php';

$id = $_GET ['id']; 

 $deletequery = "DELETE FROM `roles` WHERE role_id = $id";
 $query = mysqli_query($cons,$deletequery);


 if($query){
 
    echo "delete sussfully"; 
 
 header("location:view-role.php");
 
 }else{
     echo "delete not  "; 
 }


?>