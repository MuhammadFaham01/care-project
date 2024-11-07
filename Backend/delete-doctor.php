
<?php
include 'db.php';

$id = $_GET ['ids']; 

 $deletequery = "DELETE FROM `doctors` WHERE doctor_id = $id";
 $query = mysqli_query($cons,$deletequery);


 if($query){
 
    echo "delete sussfully"; 
 
 header("location:view-doctor.php");
 
 }else{
     echo "delete not "; 
 }


?>

