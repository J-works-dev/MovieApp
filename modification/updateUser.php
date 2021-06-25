<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Php script to update a user on the database. Both the admins and the root user accounts have access to this
// functionality.

require('connect.php');

$ID = $_POST['id'];
$email = $_POST['email'];
$monthlySubStatus = $_POST['monthlySubStatus'];
$newFlashSubStatus = $_POST['newsFlashSub'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

if($monthlySubStatus != "1"){
	$monthlySubStatus = 0;
}

if($newFlashSubStatus != "1"){
	$newFlashSubStatus = 0;
}


$sql = "UPDATE Users
	    SET email = '$email', monthlySubStatus = '$monthlySubStatus', newFlashSub ='$newFlashSubStatus', firstName = '$firstName', lastName ='$lastName'
        WHERE ID = '$ID';";
$pdo->exec($sql);
$pdo = null;
header("Location: ../modification.php?updateUser=")
?>
