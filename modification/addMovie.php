<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Php script to add a movie to the database. Both the admins and the root user accounts have access to this
// functionality.

require('connect.php');

$title = $_POST['title'];
$studio = $_POST['studio'];
$status = $_POST['status'];
$sound = $_POST['sound'];
$versions = $_POST['versions'];
$price = $_POST['price'];
$rating = $_POST['rating'];
$year = $_POST['year'];
$genre =  $_POST['genre'];
$aspect= $_POST['aspect'];

$sql = "INSERT INTO movies (`Title`, `Studio`, `Status`, `Sound`, `Versions`, `Price`, `Rating`, `Year`, `Genre`, `Aspect`) 
	   VALUES ('$title','$studio','$status','$sound','$versions','$price','$rating','$year','$genre','$aspect');";
echo $sql;

$pdo->query($sql);

$pdo = null;
header("Location: ../modification.php?addMovie=")
?>
