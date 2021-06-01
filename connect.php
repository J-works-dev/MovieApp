<?php
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "smtMovieRental";

        // Create connection
        $pdo = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $pdo->query($sql);
    $pdo->query("USE $dbname");
    $sql = "CREATE TABLE IF NOT EXISTS movies (
            ID int(11),
            Title varchar(255),
            Studio varchar(255),
            Status varchar(255),
            Sound varchar(255),
            Versions varchar(255),
            Price float(24),
            Rating varchar(255),
            Year int(11),
            Genre varchar(255),
            Aspect varchar(255),
            Search int(11));";
    $pdo->query($sql);
?>