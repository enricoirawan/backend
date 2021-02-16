<?php
session_start();
require_once('../include/db.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM movies WHERE movie_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ":id" => $id,
  ]);
  $movie = $stmt->fetch(PDO::FETCH_ASSOC);
  $movie_id = $movie['movie_id'];
  $movie_name = $movie['movie_name'];
  $movie_description = $movie['movie_description'];
  $movie_image = $movie['movie_image'];
  $movie_category = $movie['movie_category'];
  $movie_date = $movie['date_release'];
  $movie_rating = $movie['movie_rating'];
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Edit Movie</title>
</head>

<body>
  <div class="container mt-3">
    <a href="../home.php" class="btn btn-info mb-3">Back</a>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mx-auto">Edit <?= $movie_name ?> Movie Data</h5>
        <form method="POST" action="update.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $movie_id ?>">
          <input type="hidden" name="image" value="<?= $movie_image ?>">
          <div class="form-group">
            <label>Movie Name</label>
            <input name="name" value="<?= $movie_name ?>" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required><?= $movie_description ?></textarea>
          </div>
          <div class="form-group">
            <label>Movie Image</label>
            <img src="../images/<?= $movie_image ?>" style="width: 150px; height: 150px;">
            <input type="file" name="new_image" value="<?= $movie_image ?>" class="form-control-file" >
          </div>
          <div class="form-group">
            <label>Category</label>
            <select name="category" required>
              <option <?php
                      if ($movie_category == "Horror") echo "selected";
                      ?> value="Horror">Horror</option>
              <option <?php
                      if ($movie_category == "Action") echo "selected";
                      ?> value="Action">Action</option>
              <option <?php
                      if ($movie_category == "Kpop") echo "selected";
                      ?> value="Kpop">Kpop</option>
              <option <?php
                      if ($movie_category == "Romance") echo "selected";
                      ?> value="Romance">Romance</option>
            </select>
          </div>
          <div class="form-group">
            <label>Release Date</label>
            <input value="<?= $movie_date ?>" name="date" type="date" required>
          </div>
          <div class="form-group">
            <label>Rating</label>
            <input value="<?= $movie_rating ?>" name="rating" type="number" max="5" min="1" required>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>