<?php
    if (isset($_COOKIE['authority']) && $_COOKIE['authority'] == 'root')
    {
    ?>
    <section>
        <h3>Delete Movie</h3>
        <article>
            <?php
                if ($_REQUEST['deleteMovie'] == null) {
                    ?>
                    <form class="search-form" action="modification.php?deleteMovie=" method="post">
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
                    <?php
                } else {
                    $id = $_REQUEST['deleteMovie'];
                    require("connect.php");
                    $sql = "SELECT * FROM movies WHERE ID = $id";
                    $result = $pdo->query($sql);
                    if ($result->rowcount() > 0) {
                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $id = $row["ID"];
                            $title = $row["Title"];
                            $studio = $row["Studio"];
                            $status = $row["Status"];
                            $sound = $row["Sound"];
                            $versions = $row["Versions"];
                            $price = $row["Price"];
                            $rating = $row["Rating"];
                            $year = $row["Year"];
                            $genre = $row["Genre"];
                            $aspect = $row["Aspect"];
                        }
                    }
                    ?>
                        <div class="updateMovie">
                            <form name="updateMovie" action="modification/deleteMovie.php" method="post">
                                <div class="form-group">
                                    <label for="id">Movie ID:</label>
                                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="studio">Studio:</label>
                                    <input type="text" class="form-control" id="studio" name="studio" value="<?php echo $studio; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="sound">Sound:</label>
                                    <input type="text" class="form-control" id="sound" name="sound" value="<?php echo $sound; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="versions">Versions:</label>
                                    <input type="text" class="form-control" id="versions" name="versions" value="<?php echo $versions; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price:</label>
                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating:</label>
                                    <input type="text" class="form-control" id="rating" name="rating" value="<?php echo $rating; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="year">Year:</label>
                                    <input type="text" class="form-control" id="year" name="year" value="<?php echo $year; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="genre">Genre:</label>
                                    <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $genre; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="aspect">Aspect:</label>
                                    <input type="text" class="form-control" id="aspect" name="aspect" value="<?php echo $aspect; ?>" readonly>
                                </div>
                                <button type="submit" name = "submit" class="btn deleteBtn">Are You Sure Delete this Movie?</button>
                            </form>
                        </div>
                    <?php
                }
                $pdo = null;
            ?>
        </article>
    </section>
    <?php
    if ($_REQUEST['deleteMovie'] == null) {
        ?>
        <section>
            <h4>Click ID to Delete Movie</h4>
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
        <?php
        }
    }
?>