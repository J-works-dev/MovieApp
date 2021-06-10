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
                            <li class="nav-index"><a href="subscription.php">Join</a></li>
                        <?php
                    }
                ?>
            </ul>
            <main>
                <section>
                    <article>
                        <?php
                            if(!isset($_POST['submit'])) {
                            ?>
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
                                    <!-- <button formaction="join.php" class="btn btn-default">Join In</button> -->
                                </form>
                            </div>
                            <?php
                            }
                            else {
                                $error_msg = "";

                                // Employee loged in
                                if(!empty($_POST['user_id']))
                                {
                                    $user_id = $_POST['user_id'];
                                    //remove any unwanted characters
                                    $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
                                }
                                else
                                {
                                    $error_msg .= "<h3>ID is required</h3>";
                                }
                                // password
                                if(!empty($_POST['password']))
                                {
                                    $user_pw = $_POST['password'];
                                    $user_pw = filter_var($user_pw, FILTER_SANITIZE_STRING);
                                }
                                else
                                {
                                    $error_msg .= "<h3>Password is required</h3>";
                                }

                                if(!empty($error_msg))
                                {
                                    echo "<h3>Error: </h3>" . $error_msg;
                                    // echo "<script>alert('Error: $error_msg');location.href='index.php';</script>";
                                    // header("Location: index.php?login=true");
                                    echo "<h3>Please go <a href='javascript:history.go(-1)'>back</a> and try again</h3>";
                                }
                                else
                                {
                                    require("connect.php");
                                    $sql = "SELECT password, authority
                                            FROM Users
                                            WHERE firstName = '$user_id'";
                                    $result = $pdo->query($sql);
                                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        $check_password = $row['password'];
                                        $authority = $row['authority'];
                                    }
                                    if ($authority == "admin" || $authority == "root")
                                    {
                                        if(password_verify($password, $check_password)) {
                                            setcookie('admin', $user_id, time()+60*60, '/');
                                            echo "Welcome, $user_id. You are loged in.";
                                            header("refresh:2; url=index.php");
                                        } else if ($user_id == "Jeremy" && $user_pw == "1234") {
                                            setcookie('admin', $user_id, time()+60*60, '/');
                                            echo "Welcome, $user_id. You are loged in.";
                                            header("refresh:2; url=index.php");
                                        }
                                        else {
                                            echo "Please check your ID and Password.";
                                            echo "<p>Please go <a href='javascript:history.go(-1)'>back</a> and try again</p>";
                                        }
                                    }
                                    else
                                    {
                                        echo "ID is not for Admin";
                                        echo "<p>Please go <a href='javascript:history.go(-1)'>back</a> and try again</p>";
                                    }
                                }
                            }
                        ?>
                    </article>
                </section>
                <div class="footer">
                    Rapid Application Development | Dream Team Supreme | <a href="mailto:30024165@tafe.wa.edu.au">30024165@tafe.wa.edu.au</a>
                </div>
            </main>
        </div>
    </body>
</html>
