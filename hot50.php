<?php
    session_start();
    require("connect.php");
    $sql = "SELECT * FROM movies
            ORDER BY Search DESC
            LIMIT 50;";
    $result = $pdo->query($sql);

    if ($result->rowcount() > 0) {
        echo '<table class="table">
            <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Studio</th>
            <th>Rating</th>
            <th>Year</th>
            <th>Genre</th>
            </tr>';
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["ID"];
            $title = $row["Title"];
            $studio = $row["Studio"];
            $rating = $row["Rating"];
            $year = $row["Year"];
            $genre = $row["Genre"];
            echo "<tr>
                <td>$id</td>
                <td style='width: 40%;'>$title</td>
                <td>$studio</td>
                <td>$rating</td>
                <td>$year</td>
                <td>$genre</td>
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