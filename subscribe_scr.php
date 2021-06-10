<!DOCTYPE html>
<html>
    <head>
        <title>Web Programing Project</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div class="content">
            <div class="title">
                <a href="index.php"><img src="Acme Movies.png"></a>
            </div>
            <ul class="nav">
                <li class="nav-index"><a href="index.php">HOT 50</a></li>
                <li class="nav-index"><a href="movies.php">Movies</a></li>
                <li class="nav-index"><a href="top10.php">Top 10</a></li>
                <li class="nav-index active"><a href="subscription.php">News Letter Subscription</a></li>
            </ul>
            <main>
            	<?php

				require("connect.php");

				$firstName = $_POST['first_name'];
				$lastName = $_POST['last_name'];
				$email = $_POST['email'];
				$mSS = $_POST['monthlySubStatus'];
				$nFS = $_POST['newsFlashSub'];

				$sql="SELECT email FROM Users WHERE email = '$email';";
				$result = $pdo->query($sql);

				if($result->rowcount() > 0 ){
                	echo "<p1>Email Already Exists</p1>";
				}
				else{
					
    				if($mSS == NULL){
        				$mSS = 0;
    				}	

    				if($nFS == NULL){
        				$nFS = 0;
    				}
					
                	$sql = "INSERT INTO Users(email,monthlySubStatus,newFlashSub,firstName,lastName) VALUES('$email','$mSS','$nFS','$firstName','$lastName');";

				    $pdo->exec($sql);
    				echo"<p1> You have now subscribed GG</p1>";
				}
    			$pdo = null;
				?>
            </main>
            <div class="footer">
            Rapid Application Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
            </div>
        </div>
    </body>
</html>