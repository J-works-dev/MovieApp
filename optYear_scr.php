<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Enables search functionality above the list of movies on Movies.php. This script deals with searching via Year.

    require("connect.php");
    $sql = "SELECT Year
            FROM movies
            ORDER BY Year;";
    $result = $pdo->query($sql);
    
    $array = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        array_push($array, $row["Year"]);
    }
    $array = array_unique($array);
    foreach($array as $year) {
        echo "<option value=\"$year\"></option>";
    }
    
    $pdo = null;
?>