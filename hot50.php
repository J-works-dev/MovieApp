<?php
    session_start();
    require("connect.php");
    $sql = "SELECT * FROM movies
            ORDER BY Search DESC
            LIMIT 50;";
    $result = $pdo->query($sql);

    if ($result->rowcount() > 0) {
        echo "<table class='table'>
            <tr>
            <th class='table-id'>ID</th>
            <th class='table-title'>Title</th>
            <th class='table-studio'>Studio</th>
            <th class='table-rating'>Rating</th>
            <th class='table-year'>Year</th>
            <th class='table-genre'>Genre</th>
            </tr>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["ID"];
            $title = $row["Title"];
            $studio = $row["Studio"];
            $rating = $row["Rating"];
            $year = $row["Year"];
            $genre = $row["Genre"];
            echo "<tr>
                <td class='table-id'>$id</td>
                <td class='table-title' style='width: 40%;'>$title</td>
                <td class='table-studio'>$studio</td>
                <td class='table-rating'>$rating</td>
                <td class='table-year'>$year</td>
                <td class='table-genre'>$genre</td>
                </tr>";
            // header("refresh:10; url=activity4.php");
        }
        echo "</table>";
    }
    else{
        echo "0 results";
    }
    $pdo = null;
?>