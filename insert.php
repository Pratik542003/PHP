<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}

// Variables to be inserted into the table
$name = "Pratik Dhane";
$email = "pratikdhane@gmail.com";
$phone = "8626005101";
$review = "Awesome experience";
    $sql = "INSERT INTO `login` (`name`,`email`,`phone`,`review`) VALUES('$name','$email','$phone','$review')";
    $result = mysqli_query($conn,$sql);
        if($result){
            $insert = true;
         }
    else{
        echo "The record was not inserted".
    mysqli_error($conn);

  }

?>
