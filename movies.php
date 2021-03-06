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

 This Page Description: Front end for displaying all the movies in the database. Refer to listMovies_scr.php for full details on backend. -->

    <head>
        <title>Web Programing Project</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
        <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
        <script src="https://kit.fontawesome.com/6df72c3e40.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="content">
            <div class="title">
                <a class="title"  href="index.php"><img src="Acme Movies.png"alt="logo image not loaded Acme Movies"></a>
            </div>
            <ul class="nav">
                <li class="nav-index"><a href="index.php">Home</a></li>
                <li class="nav-index active"><a href="movies.php">Movies</a></li>
                <li class="nav-index"><a href="top10.php">Top 10</a></li>
                <?php
                    if(isset($_COOKIE['admin']))
                    {
                        ?>
                            <li class="nav-index"><a href="modification.php">Modification</a></li>
                            <li class="nav-index"><a href="logout.php">Log out</a></li>
                        <?php
                    }
                    else
                    {
                        ?>
                            <li class="nav-index"><a href="subscription.php">News Letter Subscription</a></li>
                        <?php
                    }
                ?>
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
                            <div class="form-group table-genre">
                                <label for="genre">Genre</label>
                                <input list="genre" class="form-control" name="genre">
                                <datalist id="genre">
                                    <?php include 'optGenre_scr.php'; ?>
                                </datalist>
                            </div>
                            <div class="form-group table-rating">
                                <label for="rating">Rating</label>
                                <input list="rating" class="form-control" name="rating">
                                <datalist id="rating">
                                    <?php include 'optRating_scr.php'; ?>
                                </datalist>
                            </div>
                            <div class="form-group table-year">
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
                            if (!(isset($_POST["submit"])) && !isset($_COOKIE['search']))
                            {
                                include 'listMovies_scr.php';
                            }
                            else
                            {
                                include 'searchMovies_scr.php';
                            }
                        ?>
                    </article>
                </section>
            </main>
            <div class="footer">
                <p>Rapid Application Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a></p>
            </div>
        </div>
    </body>
</html>