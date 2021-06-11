<?php
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
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="vPassword">Verify Password:</label>
                <input type="password" class="form-control" id="vPassword" name="vPassword">
            </div>
            <div class="form-group">
                <label for="authority">Authority:</label>
                <input list="authority" class="form-control" name="authority">
                <datalist id="authority">
                    <option value="Root"></option>
                    <option value="Admin"></option>
                    <option value="Customer"></option>
                </datalist>
            </div>
            <div class="form-group">
                <label for="monthlySubStatus">Monthly Sub: </label>
                <input type="checkbox" class="form-control" id="monthlySubStatus" name="monthlySubStatus" value="1">
            </div>
            <div class="form-group">
                <label for="newsFlashSub">News Flash Sub: </label>
                <input type="checkbox" class="form-control" id="newsFlashSub" name="newsFlashSub" value="1">
            </div>
            <button type="submit" name = "submit" class="btn updateBtn">Add User / Member</button>
        </form>
    </article>
</section>
<?php
    }
?>