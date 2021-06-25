<?php
// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Php script to update a user to the database. Both the admins and the root user accounts have access to this
// functionality.
require('connect.php');

$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$mSS = $_POST['monthlySubStatus'];
$nFS = $_POST['newFlashSub'];

if($mSS == NULL){
	$mSS = 0;
}	

if($nFS == NULL){
	$nFS = 0;
}

$sql = "INSERT INTO Users(`email`, `monthlySubStatus`, `newFlashSub`, `firstName`, `lastName`)
					VALUES('$email', '$mSS', '$nFS', '$firstName', '$lastName');";
echo $sql;
$pdo->query($sql);

$pdo = null;
header("Location: ../modification.php?addUser=")
?>