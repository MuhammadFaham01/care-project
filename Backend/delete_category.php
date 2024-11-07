

<?php
include 'db.php';

$id = $_GET ['id']; 

 $deletequery = "DELETE FROM `categories` WHERE category_id  = $id";
 $query = mysqli_query($cons,$deletequery);


 if($query){
 
    echo "delete sussfully"; 
 
 header("location:view-category.php");
 
 }else{
     echo "delete not "; 
 }


?>

