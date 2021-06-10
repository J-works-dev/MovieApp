<!DOCTYPE html>
<html>
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
                <a class="title" href="index.php"><img src="Acme Movies.png"></a>
            </div>
            <ul class="nav">
                <li class="nav-index active"><a href="index.php">Home</a></li>
                <li class="nav-index"><a href="movies.php">Movies</a></li>
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
                    <article>
                        <div class="login_container">
                            <h2>Administrator Log In</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="user_id">Admin ID:</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" name = "submit" class="btn btn-default">Log In</button>
                                <button formaction="join.php" class="btn btn-default">Join In</button>
                            </form>
                        </div>
                    </article>
                </section>
                <div class="footer">
                    Rapid Application Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
                </div>
            </main>
        </div>
    </body>
</html>
