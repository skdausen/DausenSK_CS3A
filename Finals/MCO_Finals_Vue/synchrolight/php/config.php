<?php 
    // connection to the MySQL database

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "synchrolight_db";
    
    // Parameters: hostname ("localhost"), username ("root"), password (""), database name ("synchrolight_db")
    $conn = mysqli_connect("localhost", "root", "", "synchrolight_db");

    // Check connection 
    if(!$conn){
        // If connected, print "Database connected"
        // If connection fails, mysqli_connect_error() gives the reason
        echo "Database connected" . mysqli_connect_error();
    }
?>
