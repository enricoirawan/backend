<?php session_start() ?>
<?php require_once('./include/header.php') ?>

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
  <div class="d-flex align-items-center justify-content-between">
    <!-- START:Button-Input -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Input Data</button>
    <!-- END:Button-Input -->

    <!-- START:Search-Form -->
    <form action="./functions/search.php" method="POST" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <!-- START:Search-Form -->
  </div>

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
      $sql = "SELECT * FROM movies";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([]);
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
          <td><img class="img-thumbnail" style="width: 150px; height: 150px;" src="images/<?= $movie_img ?>" alt="<?= $movie_img ?>"></td>
          <td><?= $movie_category ?></td>
          <td>
            <a href="./functions/comments.php?id=<?= $movie_id ?>" type="button" class="btn btn-sm btn-success">Comments</a>
            <a href="./functions/get_data_by_id.php?id=<?= $movie_id ?>" type="button" class="btn btn-sm btn-warning">Edit</a>
            <a href="./functions/delete.php?id=<?= $movie_id ?>" type="button" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <!-- END:Table -->
</div>

<!-- START:MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="./functions/input.php" enctype="multipart/form-data">
          <div class="form-group">
            <label>Movie Name</label>
            <input name="name" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label>Movie Image</label>
            <input type="file" name="image" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select name="category" required>
              <option value="Horror">Horror</option>
              <option value="Action">Action</option>
              <option value="Kpop">Kpop</option>
              <option value="Romance">Romance</option>
            </select>
          </div>
          <div class="form-group">
            <label>Release Date</label>
            <input name="date" type="date" required>
          </div>
          <div class="form-group">
            <label>Rating</label>
            <input name="rating" type="number" max="5" min="1" required>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END:MODAL -->

<?php require_once('./include/footer.php') ?>