<?php

// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Php script to update a user on the database. Both the admins and the root user accounts have access to this
// functionality.

    if (isset($_COOKIE['authority']) && ($_COOKIE['authority'] == 'root' || $_COOKIE['authority'] == 'admin'))
    {
    ?>
    <section>
    <h3>Update User</h3>
    <article>
        <?php
            if ($_REQUEST['updateUser'] == null) {
                ?>
                <form class="search-form" action="modification.php?updateUser=" method="post">
                    <div class="form-group">
                        <label for="id">User ID:</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName">
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                   
                    <button type="submit" class="form-group btn btn-default" name="submit" value="submit">Search</button>
                </form>
                <?php
            } else {
                $id = $_REQUEST['updateUser'];
                require("connect.php");
                $sql = "SELECT * FROM Users WHERE ID = $id";
                $result = $pdo->query($sql);
                if ($result->rowcount() > 0) {
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row["ID"];
                        $lastName = $row["lastName"];
                        $firstName = $row["firstName"];
                        $email = $row["email"];
                        $monthlySubStatus = $row["monthlySubStatus"];
                        $newsFlashSub = $row["newFlashSub"];
                        $password = $row["password"];
                        
                    }
                }
                ?>
                    <div class="updateMovie">
                        <form name="updateUser" action="modification/updateUser.php" method="post">
                            <div class="form-group">
                                <label for="id">User ID:</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
                            </div>
                            <div class="form-group">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                            </div>
                         
                        	<?php
            					if ($monthlySubStatus == 1) {
                                	$check = "checked";
                                } else {
                                	$check = "";
                                }
            				?>
                            <div class="form-group">
                                <label for="monthlySubStatus">Monthly Sub: </label>
                                <input type="checkbox" class="form-control" id="monthlySubStatus" name="monthlySubStatus" value="1" <?php echo $check; ?>>
                            </div>
                        <?php
            					if ($newsFlashSub == 1) {
                                	$ncheck = "checked";
                                } else {
                                	$ncheck = "";
                                }
            				?>
                            <div class="form-group">
                                <label for="newsFlashSub">News Flash Sub: </label>
                                <input type="checkbox" class="form-control" id="newsFlashSub" name="newsFlashSub" value="1" <?php echo $ncheck; ?>>
                            </div>
                            <button type="submit" name = "submit" class="btn updateBtn">Update User</button>
                        </form>
                    </div>
                <?php
            }
            $pdo = null;
        ?>
    </article>
</section>
<?php
if ($_REQUEST['updateUser'] == null) {
    ?>
    <section>
        <h4>Click ID to update</h4>
        <article>
            <?php
                if (!(isset($_POST["submit"])) && !isset($_COOKIE['search']))
                {
                    include 'listUsers_scr.php';
                }
                else
                {
                    include 'searchUsers_scr.php';
                }
            ?>
        </article>
    </section>
    <?php
    }
    }
?>