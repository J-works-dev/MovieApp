<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: PHP backend to allow for the graph and table to be displayed using a connection to get data
// from the database.


    require("connect.php");

// Creates 2 arrays to be used as the x and y axis on graph.
    $title = array(); // X axis.
    $search = array(); // Y axis
    $sql = "SELECT Title, Search FROM movies
            ORDER BY Search DESC
            LIMIT 10;";
    $result = $pdo->query($sql); // Query executed to get top 10 movies.

    if ($result->rowcount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($title, addslashes($row["Title"]));
            array_push($search, $row["Search"]);
        }
    }
    else{
        echo "0 results";
    }
    $pdo = null;
?>
<!DOCTYPE HTML>
<html>
<!-- Javascript to perform the chart functions. This takes the data from the arrays and forms them into a dynamic graph. -->
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script>
            window.onload = function () {
                
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "dark1", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: "Top 10 Chart"
                },
                axisY: {
                    title: "Searched"
                },
                data: [{        
                    type: "column",  
                    showInLegend: true, 
                    legendMarkerColor: "grey",
                    legendText: "Movie Title",
                    dataPoints: [      
                        <?php
                            for ($i = 0; $i < sizeof($title) - 1; $i++)
                            {
                                echo "{ y: $search[$i], label: '$title[$i]' },";
                            }
                            echo "{ y: $search[9], label: '$title[9]' }";
                        ?>
                    ]
                }]
            });
            chart.render();
            }
        </script>
    </head>
    <body>
        <div id="chartContainer" class="chartContainer" style="min-height: 350px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <section class="top10_table">
    
    	<?php
    require("connect.php");
    $title = array();
    $search = array();
    $sql = "SELECT * FROM movies
            ORDER BY Search DESC
            LIMIT 10;";
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
            <th class='table-aspect'>Views</th>
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
        	$views	= $row["Search"];
            
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
                    <td class='table-aspect'>$views</td>
                    </tr>";
        }
        echo "</table>";
    }
    else{
        echo "<h3>0 results</h3>";
    }
    	?>
    </section>
    </body>
</html>