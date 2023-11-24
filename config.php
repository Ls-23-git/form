<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lokesh";

    $conn = mysqli_connect($host,$username,$password,$dbname);

    if(!$conn){
        die("Error connecting".mysqli_connect_error());
    }
?>
