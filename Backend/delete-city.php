
<?php
include 'db.php';

$id = $_GET ['id']; 

 $deletequery = "DELETE FROM `cities` WHERE city_id = $id";
 $query = mysqli_query($cons,$deletequery);


 if($query){
 
    echo "delete sussfully"; 
 
 header("location:view-city.php");
 
 }else{
     echo "delete not "; 
 }


?>

