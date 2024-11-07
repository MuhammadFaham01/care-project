
<?php
include 'db.php';

$id = $_GET ['id']; 

 $deletequery = "DELETE FROM `users` WHERE user_id = $id";
 $query = mysqli_query($cons,$deletequery);


 if($query){
 
    echo "delete sussfully"; 
 
 header("location:view-user.php");
 
 }else{
     echo "delete not"; 
 }


?>