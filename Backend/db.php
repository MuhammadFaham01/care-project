<?php

$server = 'localhost';
$name = 'root';
$password = '';
$db = 'care';

// Correcting the function name from 'myslqi_connect' to 'mysqli_connect'
$cons = mysqli_connect($server, $name, $password, $db);

if($cons){
    echo "<script>console.log('successfully connected')</script>";
} else {
    echo "<script>console.log('connection ERROR')</script>";
}

?>
