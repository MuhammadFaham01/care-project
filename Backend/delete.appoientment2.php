

<?php
include 'db.php';

$id = $_GET ['id']; 

 $deletequery = "DELETE FROM `appoints` WHERE dappoints_id  = $id";
 $query = mysqli_query($cons,$deletequery);


 if($query){
 
    echo "delete sussfully"; 
 
 header("location:appoientment2.php");
 
 }else{
     echo "delete not "; 
 }


?>

