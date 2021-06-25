<?php
// Project Name: DTS RAD MovieDataBase website.
// Members: Robert Jacobs / Sangjoon Lee / Mitchell Pontague
// Due Date: 24/06/2021
// Website Description: User interface to allow users to interact and view a database of movies. Admins can log in and 
// manipulate the website through adding, deleting, updating and disabling entries inside the database via the website.
// This Page Description: Php script to update a client to the database. Both the admins and the root user accounts have access to this
// functionality.

    if (isset($_COOKIE['authority']) && ($_COOKIE['authority'] == 'root' || $_COOKIE['authority'] == 'admin'))
    {
    ?>
    <section>
    <h3>Add User / Team Member</h3>
    <article class="updateMovie">
        <form name="addUser" action="modification/addUser.php" method="post">
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" require>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" require>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" require>
            </div>
            <div class="form-group">
                <label for="monthlySubStatus">Monthly Sub: </label>
                <input type="checkbox" class="form-control" id="monthlySubStatus" name="monthlySubStatus" value="1">
            </div>
            <div class="form-group">
                <label for="newFlashSub">News Flash Sub: </label>
                <input type="checkbox" class="form-control" id="newFlashSub" name="newFlashSub" value="1">
            </div>
            <button type="submit" name = "submit" class="btn updateBtn">Add User / Member</button>
        </form>
    </article>
</section>
<?php
    }
?>