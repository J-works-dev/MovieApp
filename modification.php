<!DOCTYPE html>
<html>


<!-- Project Name: DTS RAD MovieDataBase website.
 Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
 Due Date: 24/06/2021
 Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
 manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.

 This Page Description: The modification.php page interacts with the modification folder located on the server. The main 
 purpose of these files is to assign extra buttons and functionality to different users. Guests only have basic functionality 
 since they represent the client. Admins get extra buttons to update, add movies to the movie database as well as adding extra 
 clients but also disabling \ their access to news letters **Apon user request**, the root admin has full functionality of all 
 the other users as well as the ability to delete movies and customer information from the database.-->


    <head>
        <title>Web Programing Project</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
        <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
        <script src="https://kit.fontawesome.com/6df72c3e40.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="content">
            <div class="title">
                <a class="title" href="index.php"><img src="Acme Movies.png" alt="logo image not loaded Acme Movies.png"></a>
            </div>
            <ul class="nav">
                <li class="nav-index"><a href="index.php">Home</a></li>
                <li class="nav-index"><a href="movies.php">Movies</a></li>
                <li class="nav-index"><a href="top10.php">Top 10</a></li>
                <?php
                    if(isset($_COOKIE['admin']))
                    {
                        ?>
                            <li class="nav-index active"><a href="modification.php">Modification</a></li>
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
                <section class="modification_main">
                    <!-- Side Nav Bar -->
                <!-- This section handles the permissions for root vs admin. if statements add extra buttons for the root user if the root user is logging in.-->
                    <div class="sideNavbar">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                            <button type="submit" name = "addMovie" class="sideBtn">Add Movie</button>
                            <button type="submit" name = "updateMovie" class="sideBtn">Update Movie</button>
                            <?php
                                if (isset($_COOKIE['authority']) && $_COOKIE['authority'] == 'root')
                                {
                                    ?>
                                        <button type="submit" name = "deleteMovie" class="sideBtn">Delete Movie</button>
                                    <?php
                                }
                            ?>
                            <button type="submit" name = "addUser" class="sideBtn">Add User</button>
                            <button type="submit" name = "updateUser" class="sideBtn">Update User</button>
                            <?php
                                if (isset($_COOKIE['authority']) && $_COOKIE['authority'] == 'root')
                                {
                                    ?>
                                        <button type="submit" name = "deleteUser" class="sideBtn">Delete User</button>
                                    <?php
                                }
                            ?>
                        </form>
                    </div>
                    <div class="modi_contents">
                        <article>
                        
                            <?php
                        // Adds extra buttons to user interface.
                                if (isset($_GET['addMovie'])) {
                                    include 'modification/addMovie_scr.php'; 
                                }
                                elseif (isset($_GET['updateMovie'])) {
                                    include 'modification/updateMovie_scr.php'; 
                                }
                                elseif (isset($_GET['deleteMovie'])) {
                                    include 'modification/deleteMovie_scr.php'; 
                                }
                                elseif (isset($_GET['addUser'])) {
                                    include 'modification/addUser_scr.php'; 
                                }
                                elseif (isset($_GET['updateUser'])) {
                                    include 'modification/updateUser_scr.php'; 
                                }
                                elseif (isset($_GET['deleteUser'])) {
                                    include 'modification/deleteUser_scr.php';
                                }
                                else {
                                    include 'listMovies_scr.php';
                                }
                            ?>
                        </article>
                    </div>
                </section>
                <div class="footer">
                    Rapid Application Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
                </div>
            </main>
        </div>
    </body>
</html>
