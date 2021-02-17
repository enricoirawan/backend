<?php
session_start();
require_once('../include/db.php');

if (!isset($_SESSION['username'])) {
  header("location:index.php");
} 

if (isset($_POST['keyword'])) {
  $keyword = $_POST['keyword'];

  $sql = "SELECT * FROM movies WHERE movie_name LIKE :keyword";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ":keyword" => '%'. $keyword .'%',
  ]);
  $count = $stmt->rowCount();
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- custom css -->
  <link rel="stylesheet" href="../styles.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

  <title>Movie App Admin</title>
</head>

<body>

  <!-- START:Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="home.php">Movie App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- END:Navbar -->

  <div class="container mt-3">
    <!-- START:Button-Back -->
    <a href="../home.php" class="btn btn-info">Back</a>
    <!-- END:Button-Back -->

    <!-- START:Table -->
    <table class="table table-striped mt-3 text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($count < 0) {
          $err = "Movie not Found";
          echo "<h5>'. $err .'</h5>";
        } else {
          $i = 1;
          while ($movies = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $movie_id = $movies['movie_id'];
            $movie_name = $movies['movie_name'];
            $movie_img = $movies['movie_image'];
            $movie_category = $movies['movie_category'];
        ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $movie_name ?></td>
              <td><img class="img-thumbnail" style="width: 150px; height: 150px;" src="../images/<?= $movie_img ?>" alt="<?= $movie_img ?>"></td>
              <td><?= $movie_category ?></td>
              <td>
                <a href="./functions/get_data_by_id.php?id=<?= $movie_id ?>" type="button" class="btn btn-sm btn-warning">Edit</a>
                <a href="./functions/delete.php?id=<?= $movie_id ?>" type="button" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
    <!-- END:Table -->
  </div>

  <?php include_once('../include/footer.php'); ?>