<?php
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