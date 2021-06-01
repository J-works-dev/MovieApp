<?php
    $reader = Reader::createFromPath(public_path().'/Movies.xlsx', 'r');
    $reader->setHeaderOffset(0);
    $records = $reader->getRecords();
    foreach ($records as $offset => $record) {
        $qs = Question::first();
        $qs->question =  $record['Question'];
        $qs->save();
    }

    $file = fopen($filename, "r");
    $tmpData = fgetcsv($file);
    echo sizeof($tmpData) . "<br>";
    print_r($tmpData[0]);
    $tmpData = array_map("utf8_encode", $tmpData);
    echo "<br>" . $tmpData[0] . "<br>";

    while (($tmpData = fgetcsv($file)) !== FALSE)
    {
        if ($getTitle)
        {
            for ($i = 0; sizeof($tmpData); $i++) {
                $title[$i] = $tmpData[$i];
            }
            $getTitle = false;
        }
        else
        {
            for ($i = 0; sizeof($tmpData); $i++) {
                $sql = "INSERT into movies($title[$i]) value ($tmpData[$i]);";
            }
        }
    }
    fclose($file);
    echo 'CSV File has been successfully Imported';
    header('Location: index.php');

    str_replace("'", "''", $row[1]);
    str_replace('"', '""', $row[1]);
    echo $row[1];

    if (is_int($row[$i]))
    {
        $sql = "INSERT into movies ('$title[$i]') value ($row[$i]);";
        $pdo->query($sql);
    }
    else if (is_float($row[$i]))
    {
        $sql = "INSERT into movies ('$title[$i]') value ($row[$i]);";
        $pdo->query($sql);
    }
    else
    {
        $sql = "INSERT into movies ('$title[$i]') value ('$row[$i]');";
        $pdo->query($sql);
    }


    $sql = "INSERT into movies ($title)
        value ($row[0], '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', $row[6], '$row[7]', $row[8], '$row[9]', '$row[10]', $row[11]);";
    $pdo->query($sql);

    // index.php upload form
    <h3>Member List</h3>
    <!-- <?php include 'hot50.php'; ?> -->
    <form action="getCSV.php" enctype="multipart/form-data" method="post" role="form">
        <div class="form-group">
            <label for="exampleInputFile">File Upload</label>
            <input type="file" name="file" id="file" size="200000">
            <p class="help-block">Only Excel/CSV File Import.</p>
        </div>
        <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
    </form>
    <!-- <?php include 'getCSV.php'; ?> -->
?>

// JS variable setting
// const num1 = parseInt("<?php echo $num1; ?>");
// const num2 = parseInt("<?php echo $num2; ?>");
// const num3 = parseInt("<?php echo $num3; ?>");
// const num4 = parseInt("<?php echo $num4; ?>");
// const num5 = parseInt("<?php echo $num5; ?>");
// const num6 = parseInt("<?php echo $num6; ?>");
// const num7 = parseInt("<?php echo $num7; ?>");
// const num8 = parseInt("<?php echo $num8; ?>");
// const num9 = parseInt("<?php echo $num9; ?>");
// const num10 = parseInt("<?php echo $num10; ?>");

// { y: num1, label: "No 1" },
// { y: num2,  label: "No 2" },
// { y: num3,  label: "No 3" },
// { y: num4,  label: "No 4" },
// { y: num5,  label: "No 5" },
// { y: num6, label: "No 6" },
// { y: num7,  label: "No 7" },
// { y: num8, label: "No 8" },
// { y: num9,  label: "No 9" },
// { y: num10,  label: "No 10" }

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
            array_push($title, $row["Title"]);
            array_push($search, $row["Search"]);
        }
    }
    else{
        echo "0 results";
    }
    $pdo = null;
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script>
        window.onload = function () {
            
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Random Integer Report"
            },
            axisY: {
                title: "Count"
            },
            data: [{        
                type: "column",  
                showInLegend: true, 
                legendMarkerColor: "grey",
                legendText: "Numbers",
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
    <div id="chartContainer" class="chartContainer" style="height: 300px; width: 50%; padding: 30px;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>