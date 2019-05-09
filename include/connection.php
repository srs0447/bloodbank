<?php 
    $host = "localhost";
    $pass = "";
    $user = "root";
    $db_name = "bloodbank";

    $conn = mysqli_connect($host, $user, $pass, $db_name);

    if(!$conn){
        die("Can't connect to database..." . mysqli_connect_error());
    }
    
?>