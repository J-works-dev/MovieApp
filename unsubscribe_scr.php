<!DOCTYPE html>
<html>

<!-- Project Name: DTS RAD MovieDataBase website.
 Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
 Due Date: 24/06/2021
 Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
 manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
 This Page Description: Display Page to allow the user to unsubscribe from the news letter. This page will email the admin 
requesting that the client puytting the request forward be removed or disabled from the database.-->

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
                <li class="nav-index"><a href="index.php">HOT 50</a></li>
                <li class="nav-index"><a href="movies.php">Movies</a></li>
                <li class="nav-index"><a href="top10.php">Top 10</a></li>
                <li class="nav-index active"><a href="subscription.php">News Letter Subscription</a></li>
            </ul>
            <main>
            	<p1>You request to unsubscribe has been sent and will be processed shortly</p1>
	    	</main>
            <div class="footer">
            Rapid Application Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
            </div>
        </div>
    </body>
</html>




<?php
// code to send to email to admin with user email, requestiung to unsub from newsletter
require("connect.php");

$email = $_POST['email'];
//$subStatus = $_POST['subStatus'];

$msg ="User email: $email has requested to unsubscribe from the newsletter";

$msg = wordwrap($msg, 255);
mail("30001661@tafe.wa.edu.au","Unsub Test",$msg);

echo $msg;
// not yet implemented due to pre-alpha testing. We understand the php.ini file needs to be altered to allow email functionality 
?>