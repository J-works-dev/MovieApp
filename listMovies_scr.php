<?php
//     echo "<script type='text/javascript'>
//     $(window).resize(function() {
//         var width = window.innerWidth;
//         window.location.replace('movies.php?width='+width);
//     });
// </script>";

    require("connect.php");
    $total_row = 0;
    $start_from = 0;
    $total_pages = 0;
    $result_per_page = 15;
    
    $sql = "SELECT * FROM movies";
    $result = $pdo->query($sql);

    if ($result->rowcount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $total_row++;
        }
        $total_pages = ceil($total_row / $result_per_page);
    }

    if (isset($_GET["page"]))
    {
        $page  = $_GET["page"];
        $start_from = ($page - 1) * $result_per_page;
    }
    else
    {
        $page=1;
    }; 

    $sql = "SELECT * FROM movies LIMIT $start_from, $result_per_page;";
    $result = $pdo->query($sql);

    if ($result->rowcount() > 0) {
        echo "<table class='table'>
            <tr>
            <th class='table-id'>ID</th>
            <th class='table-title'>Title</th>
            <th class='table-studio'>Studio</th>
            <th class='table-status'>Status</th>
            <th class='table-sound'>Sound</th>
            <th class='table-versions'>Versions</th>
            <th class='table-price'>Price</th>
            <th class='table-rating'>Rating</th>
            <th class='table-year'>Year</th>
            <th class='table-genre'>Genre</th>
            <th class='table-aspect'>Aspect</th>
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
                echo "<tr>";
                if (isset($_GET['updateMovie'])) {
                    echo "<td class='table-id' onclick=popfields($id)><a href='modification.php?updateMovie=$id'>$id</a></td>";
                } elseif (isset($_GET['deleteMovie'])) {
                    echo "<td class='table-id' onclick=popfields($id)><a href='modification.php?deleteMovie=$id'>$id</a></td>";
                } else {
                    echo "<td class='table-id'>$id</td>";
                }
                echo "<td class='table-title'>$title</td>
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
    echo "<div class='page-num'>";
    if ($total_pages < 15)
    {
        for ($i = 1; $i <= $total_pages; $i++)
        {
            echo "<a href='movies.php?page=".$i."'>".$i."</a>";
        }
    }
    else
    {
        if ($page < 6)
        {
            for ($i = 1; $i < $page; $i++)
            {
                echo "<a href='movies.php?page=".$i."'>".$i."</a>";
            }
        }
        else
        {
            echo "<a href='movies.php?page=1'>" . "<<" . "</a>";
            echo "<a href='movies.php?page=". ($page - 1) ."'>" . "<" . "</a>";
            for ($i = $page - 5; $i < $page; $i++)
            {
                echo "<a href='movies.php?page=".$i."'>".$i."</a>";
            }
        }
        echo "<span class='current_page'>$page</span>";
        if ($page + 5 < $total_pages)
        {
            for ($i = $page + 1; $i <= $page + 5; $i++)
            {
                echo "<a href='movies.php?page=".$i."'>".$i."</a>";
            }
            echo "<a href='movies.php?page=".($page + 1)."'>" . ">" . "</a>";
            echo "<a href='movies.php?page=".$total_pages."'>" . ">>" . "</a>";
        }
        else
        {
            if ($page === $total_pages) 
            {
                echo "<span class='current_page'>$page</span>";
            }
            else{
                for ($i = $page + 1; $i <= $total_pages; $i++)
                {
                    echo "<a href='movies.php?page=".$i."'>".$i."</a>";
                }
            }
        }
        
    }
    echo "</div>";
    $pdo = null;
?>