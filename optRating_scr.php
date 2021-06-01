<?php
    require("connect.php");
    $sql = "SELECT Rating
            FROM movies
            ORDER BY Rating;";
    $result = $pdo->query($sql);
    
    $array = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        array_push($array, $row["Rating"]);
    }
    $array = array_unique($array);
    foreach($array as $rating) {
        echo "<option value=\"$rating\"></option>";
    }
    
    $pdo = null;
?>