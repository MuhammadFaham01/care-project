
<?php
include 'db.php';

$id = $_GET ['id']; 

 $deletequery = "DELETE FROM `contact` WHERE contact_id = $id";
 $query = mysqli_query($cons,$deletequery);


 if($query){
 
    echo "delete sussfully"; 
 
 header("location:view-contact.php");
 
 }else{
     echo "delete not "; 
 }


?>

