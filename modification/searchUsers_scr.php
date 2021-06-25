<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Allows the admin staff to search for users via the database. Displays them with usual format similar to the movie pages.

    require "connect.php";
    $total_row = 0;
    $start_from = 0;
    $total_pages = 0;
    $result_per_page = 15;
    
if (isset($_SESSION["title"]) || isset($_SESSION["genre"]) || isset($_SESSION["rating"]) || isset($_SESSION["year"])) {
    $s_id = $_SESSION["id"];
    $s_lastName = $_SESSION["lastName"];
    $s_firstName = $_SESSION["firstName"];
    $s_email = $_SESSION["email"];
   
}
else
{
    $s_id = $_POST["id"];
    $s_lastName = $_POST["lastName"];
    $s_firstName = $_POST["firstName"];
    $s_email = $_POST["email"];
   
}
if (isset($_POST["submit"])) {
    $s_id = $_POST["id"];
    $s_lastName = $_POST["lastName"];
    $s_firstName = $_POST["firstName"];
    $s_email = $_POST["email"];
   
}

if (!empty($s_id)) {
    $sql = "SELECT * FROM Users
            WHERE ID = '$s_id';";
}
elseif (!empty($s_lastName)) {
    $sql = "SELECT * FROM Users
            WHERE lastName = '%$s_lastName%';";
}
elseif (!empty($s_firstName)) {
    $sql = "SELECT * FROM Users
            WHERE firstName = '%$s_firstName%';";
}
elseif (!empty($s_email)) {
    $sql = "SELECT * FROM Users
            WHERE email = '%$s_email%';";
}

$_SESSION["id"] = $s_id;
$_SESSION["lastName"] = $s_lastName;
$_SESSION["firstName"] = $s_firstName;
$_SESSION["email"] = $s_email;


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

if (!empty($s_id)) {
    $sql = "SELECT * FROM Users
            WHERE ID = '$s_id'
            LIMIT $start_from, $result_per_page;";
}
elseif (!empty($s_lastName)) {
    $sql = "SELECT * FROM Users
            WHERE lastName LIKE '%$s_lastName%'
            LIMIT $start_from, $result_per_page;";
}
elseif (!empty($s_firstName)) {
    $sql = "SELECT * FROM Users
            WHERE firstName LIKE '%$s_firstName%'
            LIMIT $start_from, $result_per_page;";
}
elseif (!empty($s_email)) {
    $sql = "SELECT * FROM Users
            WHERE email LIKE '%$s_email%'
            LIMIT $start_from, $result_per_page;";
}

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
if ($total_pages < 15) {
    for ($i = 1; $i <= $total_pages; $i++)
    {
        echo "<a href='modification.php?updateUser=&?page=".$i."'>".$i."</a>";
    }
}
else
{
    if ($page < 6) {
        for ($i = 1; $i < $page; $i++)
        {
            echo "<a href='modification.php?updateUser=&?page=".$i."'>".$i."</a>";
        }
    }
    else
    {
        echo "<a href='modification.php?updateUser=&?page=1'>" . "<<" . "</a>";
        echo "<a href='modification.php?updateUser=&?page=". ($page - 1) ."'>" . "<" . "</a>";
        for ($i = $page - 5; $i < $page; $i++)
        {
            echo "<a href='modification.php?updateUser=&?page=".$i."'>".$i."</a>";
        }
    }
    echo "<span class='current_page'>$page</span>";
    if ($page + 5 < $total_pages) {
        for ($i = $page + 1; $i <= $page + 5; $i++)
        {
            echo "<a href='modification.php?updateUser=&?page=".$i."'>".$i."</a>";
        }
        echo "<a href='modification.php?updateUser=&?page=".($page + 1)."'>" . ">" . "</a>";
        echo "<a href='modification.php?updateUser=&?page=".$total_pages."'>" . ">>" . "</a>";
    }
    else
    {
        if ($page === $total_pages) {
            echo "<span class='current_page'>$page</span>";
        }
        else{
            for ($i = $page + 1; $i <= $total_pages; $i++)
            {
                echo "<a href='modification.php?updateUser=&?page=".$i."'>".$i."</a>";
            }
        }
    }
        
}
    echo "</div>";
    $pdo = null;
?>
