<!DOCTYPE html>
<html>

<!-- Project Name: DTS RAD MovieDataBase website.
 Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
 Due Date: 24/06/2021
 Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
 manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
 This Page Description: Customer Display for subcription news letter. The user can add their information as well as ticking
 check boxes to either recieve a monthly news letters or News Flash news letter. These inputs are saved into the database for later recall.-->


    <head>
        <title>Web Programing Project</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div class="content">
            <div class="title">
                <a href="index.php"><img src="Acme Movies.png"alt="logo image not loaded Acme Movies"></a>
            </div>
            <ul class="nav">
                <li class="nav-index"><a href="index.php">Home</a></li>
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