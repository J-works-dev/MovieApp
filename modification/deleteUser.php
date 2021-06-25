<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Php script to delete a user from the database. Only the root admin has access to this functionality.

require('connect.php');

$ID = $_POST['id'];

$sql = "DELETE FROM Users WHERE ID = '$ID';";
$pdo->query($sql);
$pdo=null;
echo $sql;
header("Location: ../modification.php?deleteUser=")
?>