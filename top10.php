<!DOCTYPE html>
<html>
    <head>
        <title>Web Programing Project</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
        <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div class="content">
            <div class="title">
                <a class="title"  href="index.php"><img src="Acme Movies.png"></a>
            </div>
            <ul class="nav">
                <li class="nav-index"><a href="index.php">HOT 50</a></li>
                <li class="nav-index"><a href="movies.php">Movies</a></li>
                <li class="nav-index active"><a href="top10.php">Top 10</a></li>
                <li class="nav-index"><a href="subscription.php">News Letter Subscription</a></li>
            </ul>
            <main>
                <section>
                    <h3>Top 10 Chart</h3>
                    <p>This chart shows top 10 most frequently searched movies.</p>
                    <article>
                        <?php include 'top10_scr.php'; ?>
                    </article>
                </section>
                <div class="footer">
                    Rapid Application Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
                </div>
            </main>
        </div>
    </body>
</html>