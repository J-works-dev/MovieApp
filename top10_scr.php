<?php
    require("connect.php");
    $title = array();
    $search = array();
    $sql = "SELECT Title, Search FROM movies
            ORDER BY Search DESC
            LIMIT 10;";
    $result = $pdo->query($sql);

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
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script>
            window.onload = function () {
                
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
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
    </body>
</html>