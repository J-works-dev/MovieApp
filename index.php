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
                    if(isset($_COOKIE['admin']) || isset($_COOKIE['root']))
                    {
                        ?>
                            <li><a href="addEmployee.php">Modification</a></li>
                        <?php
                    }
                ?>
                <li class="nav-index"><a href="subscription.php">News Letter Subscription</a></li>
            </ul>
            <main>
                <section>
                    <article>
                        <div class="home_container">
                            <a href="subscription.php">
                                <div class="customer">
                                    <i class="fas fa-users"></i>
                                    <h2>Customer</h2>
                                </div>
                            </a>
                            <a href="login.php">
                                <div class="admin">
                                    <i class="fas fa-user-lock"></i>
                                    <h2>Administrator</h2>
                                </div>
                            </a>
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
