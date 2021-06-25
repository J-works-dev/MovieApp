<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Allows the admin staff of the website to view the client database via the website. This is used by 
// other scripts to manipulate the data.

    require("connect.php");
    $total_row = 0;
    $start_from = 0;
    $total_pages = 0;
    $result_per_page = 15;
    
    $sql = "SELECT * FROM Users";
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

    $sql = "SELECT * FROM Users LIMIT $start_from, $result_per_page;";
    $result = $pdo->query($sql);

    if ($result->rowcount() > 0) {
        echo "<table class='table'>
            <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>E-mail</th>
            <th>monthly Sub</th>
            <th>News Flash Sub</th>
            <th>Password</th>
            </tr>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["ID"];
            $lastName = $row["lastName"];
            $firstName = $row["firstName"];
            $email = $row["email"];
            $monthlySubStatus = $row["monthlySubStatus"];
            $newFlashSub = $row["newFlashSub"];
            $password = $row["password"];
            // $authority = $row["authority"];
            echo "<tr>";
            if (isset($_GET['updateUser'])) {
                echo "<td onclick=popfields($id)><a href='modification.php?updateUser=$id'>$id</a></td>";
            } elseif (isset($_GET['deleteUser'])) {
                echo "<td onclick=popfields($id)><a href='modification.php?deleteUser=$id'>$id</a></td>";
            } else {
                echo "<td>$id</td>";
            }
            echo "<td>$lastName</td>
                <td>$firstName</td>
                <td>$email</td>
                <td>$monthlySubStatus</td>
                <td>$newFlashSub</td>
                <td>$password</td>
                </tr>";
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
            echo "<a href='modification.php?updateUser=&page=".$i."'>".$i."</a>";
        }
    }
    else
    {
        if ($page < 6)
        {
            for ($i = 1; $i < $page; $i++)
            {
                echo "<a href='modification.php?updateUser=&page=".$i."'>".$i."</a>";
            }
        }
        else
        {
            echo "<a href='modification.php?updateUser=&page=1'>" . "<<" . "</a>";
            echo "<a href='modification.php?updateUser=&page=". ($page - 1) ."'>" . "<" . "</a>";
            for ($i = $page - 5; $i < $page; $i++)
            {
                echo "<a href='modification.php?updateUser=&page=".$i."'>".$i."</a>";
            }
        }
        echo "<span class='current_page'>$page</span>";
        if ($page + 5 < $total_pages)
        {
            for ($i = $page + 1; $i <= $page + 5; $i++)
            {
                echo "<a href='modification.php?updateUser=&page=".$i."'>".$i."</a>";
            }
            echo "<a href='modification.php?updateUser=&page=".($page + 1)."'>" . ">" . "</a>";
            echo "<a href='modification.php?updateUser=&page=".$total_pages."'>" . ">>" . "</a>";
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
                    echo "<a href='modification.php?updateUser=&page=".$i."'>".$i."</a>";
                }
            }
        }
        
    }
    echo "</div>";
    $pdo = null;
?>