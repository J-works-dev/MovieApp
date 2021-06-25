<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: This page is the backend script for the search functionality. It takes the user inputs and interprates them
// to generate a sql query. When the query is executed the information is assigned and send to the search.php page to be displayed.

    require "connect.php";
    $total_row = 0;
    $start_from = 0;
    $total_pages = 0;
    $result_per_page = 25;
   
// Checks if any of the boxes are filled.
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
// Grabs the information from the search criteria.
if (isset($_POST["submit"])) {
    $s_title = $_POST["title"];
    $s_genre = $_POST["genre"];
    $s_rating = $_POST["rating"];
    $s_year = $_POST["year"];
}

// Validates the input from each box and builds a query based on each possible combination of entries.
// This section is to execute a query that allows the "Searched" Column to be updated each time a movie is searched for.
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
  
// Query is assembled and executed to enable the search counter to keep track of how often each movie is searched by the clients.
    $result = $pdo->query($sql);
	$stringSplit = explode("WHERE",$sql);
	$Viewsql = "UPDATE movies
            SET Search = Search + 1
           	WHERE $stringSplit[1]";
	$pdo->exec($Viewsql);
	
// Rows are assembled for display.
if ($result->rowcount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $total_row++;
    }
    $total_pages = ceil($total_row / $result_per_page);
}
// Assigns cap on number of pages.
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
    $start_from = ($page - 1) * $result_per_page;
}
else
{
    $page=1;
}; 

// Displays the original request via the client now that the search counter has completed.
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
	

// Displays the table in UI.
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
        if (isset($_COOKIE['admin'])) {
            echo "<tr>
                <td class='table-id' onclick=popfields($id)><a href='modification.php?updateMovie=$id'>$id</a></td>
                <td class='table-title'>$title</td>
                <td class='table-studio'>$studio</td>
                <td class='table-status'>$status</td>
                <td class='table-sound'>$sound</td>
                <td class='table-versions'>$versions</td>
                <td class='table-price'>$price</td>
                <td class='table-rating'>$rating</td>
                <td class='table-year'>$year</td>
                <td class='table-genre'>$genre</td>
                <td class='table-aspect'>$aspect</td>
                </tr>";
        } else {
            echo "<tr>
                <td class='table-id'>$id</td>
                <td class='table-title'>$title</td>
                <td class='table-studio'>$studio</td>
                <td class='table-status'>$status</td>
                <td class='table-sound'>$sound</td>
                <td class='table-versions'>$versions</td>
                <td class='table-price'>$price</td>
                <td class='table-rating'>$rating</td>
                <td class='table-year'>$year</td>
                <td class='table-genre'>$genre</td>
                <td class='table-aspect'>$aspect</td>
                </tr>";
        }
    }
    echo "</table>";
}
else{
    echo "<h3>0 results</h3>";
}
// Organises the pages by number of entries and setting numbers below to navigate them.
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
