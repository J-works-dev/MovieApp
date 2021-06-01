<?php
    include('SimpleCSV.php');
    if (isset($_POST["submit"]))
    {
        require("connect.php");
        $sql = "TRUNCATE table movies";
        $pdo->query($sql);      

        $getTitle = true;

        if ( $csv = SimpleCSV::import('Movies.csv') ) {
            foreach ($csv as $row)
            {
                if (!(array_key_exists(1, $row))) {break;} // if array is empty, break the loop

                if ($getTitle)
                {
                    // $title = $row;
                    // array_push($title, "Search");
                    $title = $row[0];
                    for ($i = 1; $i < sizeof($row); $i++)
                    {
                        $title .= ", " . $row[$i];
                    }
                    $title .= ", " . "Search";
                    $getTitle = false;
                }
                else
                {
                    $rnd = rand(0, 10000);
                    array_push($row, $rnd); // add random Number for temp searching value
                    
                    addslashes($row[1]);
                    if (str_contains($row[1], '"'))
                    {
                        $sql = "INSERT into movies (ID, Title, Studio, Status, Sound, Versions, Price, Rating, Year, Genre, Aspect, Search)
                            value ($row[0], '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', $row[6], '$row[7]', $row[8], '$row[9]', '$row[10]', $row[11]);";
                        $pdo->query($sql);
                    }
                    else
                    {
                        $sql = "INSERT into movies (ID, Title, Studio, Status, Sound, Versions, Price, Rating, Year, Genre, Aspect, Search)
                                value ($row[0], \"$row[1]\", '$row[2]', '$row[3]', '$row[4]', '$row[5]', $row[6], '$row[7]', $row[8], '$row[9]', '$row[10]', $row[11]);";
                        $pdo->query($sql);

                    }
                }
            }
            echo 'CSV File has been successfully Imported';
            header("refresh:3; url=index.php");
        } else {
            echo SimpleCSV::importError();
        }
    }
    $pdo = null;
?>