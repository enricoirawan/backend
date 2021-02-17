<?php
session_start();
require_once('../include/db.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM comments WHERE movie_id = :movie_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ":movie_id" => $id,
  ]);
  $count = $stmt->rowCount();
}

// if (isset($_POST['submit'])) {
//   $id = $_GET['id'];
//   $username = $_POST['username'];
//   $comment_text = $_POST['comment_text'];

//   if(!$username){
//     $username = "Anon";
//   }else{
//     $username = $_POST['username'];
//   }

//   $sql = "INSERT INTO comments VALUES ('', :movie_id, :username, :text)";
//   $stmt = $pdo->prepare($sql);
//   $result = $stmt->execute([
//     ":movie_id" => $id,
//     ":username" => $username,
//     ":text" => $comment_text,
//   ]);

//   if ($result) {
//     header("location: comments.php?id=" . $id);
//   }
// }
?>

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
    <div class="row">
      <h5 class="d-inline-block mx-auto">King Kong Movie Comments</h5>
    </div>

    <!-- START:Comments -->
    <div>
      <?php
      if ($count == 0 || $count == null) {
        echo "<h5>Belum ada komentar</h5>";
      } else {
        while ($comments = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $comment_id = $comments['comments_id'];
          $comment_username = $comments['comment_username'];
          $comment_text = $comments['comment_text']; ?>

          <h5><?= $comment_username ?></h5>
          <p><?= $comment_text ?></p>
          <hr>
      <?php }
      }
      ?>
    </div>
    <!-- END:Comments -->

    <!-- START:Form-Comments -->
    <!-- <form method="POST">
      <div class="form-group">
        <label>Username</label>
        <input placeholder="Anon" type="text" name="username" class="form-control" />
      </div>
      <div class="form-group">
        <label>Comments</label>
        <textarea required name="comment_text" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <button name="submit" class="btn btn-primary">Submit</button>
    </form> -->
    <!-- END:Form-Comments -->
  </div>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>