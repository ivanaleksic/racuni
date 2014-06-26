<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbDatabase = "racuni";
    $con=mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database.");;
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>