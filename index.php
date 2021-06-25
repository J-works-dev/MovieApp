<!DOCTYPE html>
<html>

<!-- Project Name: DTS RAD MovieDataBase website.
 Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
 Due Date: 24/06/2021
 Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
 manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
 This Page Description: The index page serves as the main home page of the entire website. It is the main entry point where users can login
 as either root or admins alternatively they can click customer and use a guest account.-->

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
            <a class="title" href="index.php"><img src="Acme Movies.png" alt="logo image not loaded Acme Movies"></a> 
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
                            <li class="nav-index"><a href="subscription.php">Join</a></li>
                        <?php
                    }
                ?>
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
