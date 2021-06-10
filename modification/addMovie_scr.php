<section>
    <h3>Add Movie</h3>
    <article class="updateMovie">
        <form name="updateMovie" action="modification/addMovie.php" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="studio">Studio:</label>
                <input type="text" class="form-control" id="studio" name="studio">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status">
            </div>
            <div class="form-group">
                <label for="sound">Sound:</label>
                <input type="text" class="form-control" id="sound" name="sound">
            </div>
            <div class="form-group">
                <label for="versions">Versions:</label>
                <input type="text" class="form-control" id="versions" name="versions">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="text" class="form-control" id="rating" name="rating">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" id="year" name="year">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" id="genre" name="genre">
            </div>
            <div class="form-group">
                <label for="aspect">Aspect:</label>
                <input type="text" class="form-control" id="aspect" name="aspect">
            </div>
            <button type="submit" name = "submit" class="btn updateBtn">Add Movie</button>
        </form>
    </article>
</section>