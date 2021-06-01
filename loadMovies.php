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
                <a href="index.php"><img src="SMTlogo.png"></a>
            </div>
            <ul class="nav">
                <li class="nav-index"><a href="index.php">HOT 50</a></li>
                <li class="nav-index"><a href="movies.php">Movies</a></li>
                <li class="nav-index"><a href="top10.php">Top 10</a></li>
                <li class="nav-index active"><a href="loadMovies.php">Load Movies</a></li>
            </ul>
            <main>
                <section>
                    <article>
                        <form action="getCSV.php" enctype="multipart/form-data" method="post" role="form">
                            <button type="submit" class="btn btn-default" name="submit" value="submit">Load Movies</button>
                        </form>
                    </article>
                </section>
            </main>
            <div class="footer">
                Web Programming Project | Sang Joon Lee | 30024165 | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
            </div>
        </div>
    </body>
</html>