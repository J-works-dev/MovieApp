<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Connection script that allows other php / html pages to connect to the database. The connection is closed after
// script is complete.



    try {
       
        $username = "adminer";
        $password = "P@ssw0rd";
        $dbname = "smtMovieRental";

        // Create connection
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=smtMovieRental', $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    // Creates Database if one does not already exist.
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