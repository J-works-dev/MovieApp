<!DOCTYPE html>
<html>
    <head>
        <title>Web Programing Project</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div class="content">
            <div class="title">
                <a href="index.php"><img src="Acme Movies.png"></a>
            </div>
            <ul class="nav">
                <li class="nav-index active"><a href="index.php">HOT 50</a></li>
                <li class="nav-index"><a href="movies.php">Movies</a></li>
                <li class="nav-index"><a href="top10.php">Top 10</a></li>
                <li class="nav-index"><a href="loadMovies.php">Load Movies</a></li>
            </ul>
            <main>
                <section>
                    <h3>Hot 50s!!</h3>
                    <article>
                        <?php require 'hot50.php'; ?>
                    </article>
                </section>
                <div class="footer">
                    Web Programming Project | Sang Joon Lee | 30024165 | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
                </div>
            </main>
        </div>
    </body>
</html>
