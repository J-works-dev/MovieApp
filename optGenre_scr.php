<?php
    require("connect.php");
    $sql = "SELECT Genre
            FROM movies
            ORDER BY Genre;";
    $result = $pdo->query($sql);
    
    $array = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        array_push($array, $row["Genre"]);
    }
    $array = array_unique($array);
    foreach($array as $genre) {
        echo "<option value=\"$genre\"></option>";
    }
    
    $pdo = null;
?>