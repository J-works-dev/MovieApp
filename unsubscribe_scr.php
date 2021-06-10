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