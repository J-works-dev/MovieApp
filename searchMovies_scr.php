<?php
    require "connect.php";
    $total_row = 0;
    $start_from = 0;
    $total_pages = 0;
    $result_per_page = 25;
    // if (isset($_POST["submit"]) || isset($_SESSION["title"]) || isset($_SESSION["genre"]) || isset($_SESSION["rating"]) || isset($_SESSION["year"]))
    // {
if (isset($_SESSION["title"]) || isset($_SESSION["genre"]) || isset($_SESSION["rating"]) || isset($_SESSION["year"])) {
    $s_title = $_SESSION["title"];
    $s_genre = $_SESSION["genre"];
    $s_rating = $_SESSION["rating"];
    $s_year = $_SESSION["year"];
}
else
{
    $s_title = $_POST["title"];
    $s_genre = $_POST["genre"];
    $s_rating = $_POST["rating"];
    $s_year = $_POST["year"];
}
if (isset($_POST["submit"])) {
    $s_title = $_POST["title"];
    $s_genre = $_POST["genre"];
    $s_rating = $_POST["rating"];
    $s_year = $_POST["year"];
}

if (!empty($s_genre) && !empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
                WHERE Genre = '$s_genre' AND Rating = '$s_rating' AND Year = '$s_year';";
}
elseif (empty($s_genre) && !empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
                WHERE Rating = '$s_rating' AND Year = '$s_year';";
}
elseif (!empty($s_genre) && empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
                WHERE Genre = '$s_genre' AND Year = '$s_year';";
}
elseif (!empty($s_genre) && !empty($s_rating) && empty($s_year)) {
    $sql = "SELECT * FROM movies
                WHERE Genre = '$s_genre' AND Rating = '$s_rating';";
}
elseif (empty($s_genre) && empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
                WHERE Year = '$s_year';";
}
elseif (empty($s_genre) && !empty($s_rating) && empty($s_year)) {
    $sql = "SELECT * FROM movies
                WHERE Rating = '$s_rating';";
}
elseif (!empty($s_genre) && empty($s_rating) && empty($s_year)) {
    $sql = "SELECT * FROM movies
                WHERE Genre = '$s_genre';";
}
elseif (!empty($s_title)) {
    $sql = "SELECT * FROM movies
                WHERE Title LIKE '%$s_title%';";
}
        $_SESSION["title"] = $s_title;
        $_SESSION["genre"] = $s_genre;
        $_SESSION["rating"] = $s_rating;
        $_SESSION["year"] = $s_year;
    // }
        
        
    
    $result = $pdo->query($sql);
    
if ($result->rowcount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $total_row++;
    }
    $total_pages = ceil($total_row / $result_per_page);
}
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
    $start_from = ($page - 1) * $result_per_page;
}
else
{
    $page=1;
}; 

if (!empty($s_genre) && !empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
            WHERE Genre = '$s_genre' AND Rating = '$s_rating' AND Year = '$s_year'
            LIMIT $start_from, $result_per_page;";
}
elseif (empty($s_genre) && !empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
            WHERE Rating = '$s_rating' AND Year = '$s_year'
            LIMIT $start_from, $result_per_page;";
}
elseif (!empty($s_genre) && empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
            WHERE Genre = '$s_genre' AND Year = '$s_year'
            LIMIT $start_from, $result_per_page;";
}
elseif (!empty($s_genre) && !empty($s_rating) && empty($s_year)) {
    $sql = "SELECT * FROM movies
            WHERE Genre = '$s_genre' AND Rating = '$s_rating'
            LIMIT $start_from, $result_per_page;";
}
elseif (empty($s_genre) && empty($s_rating) && !empty($s_year)) {
    $sql = "SELECT * FROM movies
            WHERE Year = '$s_year'
            LIMIT $start_from, $result_per_page;";
}
elseif (empty($s_genre) && !empty($s_rating) && empty($s_year)) {
    $sql = "SELECT * FROM movies
            WHERE Rating = '$s_rating'
            LIMIT $start_from, $result_per_page;";
}
elseif (!empty($s_genre) && empty($s_rating) && empty($s_year)) {
    $sql = "SELECT * FROM movies
            WHERE Genre = '$s_genre'
            LIMIT $start_from, $result_per_page;";
}
elseif (!empty($_title)) {
        $sql = "SELECT * FROM movies
                WHERE Title LIKE '%$s_title%'
                LIMIT $start_from, $result_per_page;";
}
    $result = $pdo->query($sql);

if ($result->rowcount() > 0) {
    echo "<table class='table'>
            <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Studio</th>
            <th>Status</th>
            <th>Sound</th>
            <th>Versions</th>
            <th>Price</th>
            <th>Rating</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Aspect</th>
            </tr>";
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $id = $row["ID"];
        $title = $row["Title"];
        $studio = $row["Studio"];
        $status = $row["Status"];
        $sound = $row["Sound"];
        $versions = $row["Versions"];
        $price = $row["Price"];
        $rating = $row["Rating"];
        $year = $row["Year"];
        $genre = $row["Genre"];
        $aspect = $row["Aspect"];
        echo "<tr>
                <td>$id</td>
                <td>$title</td>
                <td>$studio</td>
                <td>$status</td>
                <td>$sound</td>
                <td>$versions</td>
                <td>$price</td>
                <td>$rating</td>
                <td>$year</td>
                <td>$genre</td>
                <td>$aspect</td>
                </tr>";
    }
    echo "</table>";
}
else{
    echo "<h3>0 results</h3>";
}
    echo "<div class='page-num'>";
if ($total_pages < 15) {
    for ($i = 1; $i <= $total_pages; $i++)
    {
        echo "<a href='search.php?page=".$i."'>".$i."</a>";
    }
}
else
{
    if ($page < 6) {
        for ($i = 1; $i < $page; $i++)
        {
            echo "<a href='search.php?page=".$i."'>".$i."</a>";
        }
    }
    else
    {
        echo "<a href='search.php?page=1'>" . "<<" . "</a>";
        echo "<a href='search.php?page=". ($page - 1) ."'>" . "<" . "</a>";
        for ($i = $page - 5; $i < $page; $i++)
        {
            echo "<a href='search.php?page=".$i."'>".$i."</a>";
        }
    }
    echo "<span class='current_page'>$page</span>";
    if ($page + 5 < $total_pages) {
        for ($i = $page + 1; $i <= $page + 5; $i++)
        {
            echo "<a href='search.php?page=".$i."'>".$i."</a>";
        }
        echo "<a href='search.php?page=".($page + 1)."'>" . ">" . "</a>";
        echo "<a href='search.php?page=".$total_pages."'>" . ">>" . "</a>";
    }
    else
    {
        if ($page === $total_pages) {
            echo "<span class='current_page'>$page</span>";
        }
        else{
            for ($i = $page + 1; $i <= $total_pages; $i++)
            {
                echo "<a href='search.php?page=".$i."'>".$i."</a>";
            }
        }
    }
        
}
    echo "</div>";
    $pdo = null;
?>
