<?php
    include_once('connection.php');
    if(isset($_POST['donate'])){
        $sql = "UPDATE users SET `status` ='available' WHERE email=$email";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn); 
    }
    if(isset($_POST['request'])){
        echo "Request send"; 
    }



?>