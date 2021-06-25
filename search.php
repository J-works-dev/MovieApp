<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<!-- Project Name: DTS RAD MovieDataBase website.
 Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
 Due Date: 24/06/2021
 Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
 manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
 This Page Description:  This page is the front end of the search functionality. Once the user has chosen the search criteria and 
 hit the search button this page will be displayed with all the results.-->


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
                <li class="nav-index"><a href="index.php">HOT 50</a></li>
                <li class="nav-index active"><a href="movies.php">Movies</a></li>
                <li class="nav-index"><a href="top10.php">Top 10</a></li>
                <li class="nav-index"><a href="loadMovies.php">Load Movies</a></li>
            </ul>
            <main>
                <section>
                    <h3>Search</h3>
                    <article class="search">
                        <form class="search-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="title" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input list="genre" class="form-control" name="genre">
                                <datalist id="genre">
                                    <?php include 'optGenre_scr.php'; ?>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input list="rating" class="form-control" name="rating">
                                <datalist id="rating">
                                    <?php include 'optRating_scr.php'; ?>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input list="year" class="form-control" name="year">
                                <datalist id="year">
                                    <?php include 'optYear_scr.php'; ?>
                                </datalist>
                            </div>
                            <button type="submit" class="form-group btn btn-default" name="submit" value="submit">Search</button>
                        </form>
                    </article>
                </section>
                <section>
                    <h3>Movie List</h3>
                    <article>
                        <?php
                                include 'searchMovies_scr.php';
                        ?>
                    </article>
                </section>
            </main>
            <div class="footer">
                <p>Rapid Applicaation Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a></p>
            </div>
        </div>
    </body>
</html>