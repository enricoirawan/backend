<?php require_once('./include/db.php') ?>
<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ":username" => $username,
    ":password" => $password,
  ]);

  $count = $stmt->rowCount();
  if ($count == 1) {
    // mengambil data user admin
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $user["username"];

    // set session
    $_SESSION['username'] = $username;
    $_SESSION['login'] = true;
    header('Refresh:1;url=home.php');
  } else {
    $error = "Username dan Password salah";
  }
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

  <title>Movie App</title>
</head>

<body class="bg-primary">
  <div class="container">
  <div class="card mx-auto my-5" style="width: 18rem;">
    <h5 class="card-title mx-auto mt-3 mb-0">Admin Login</h5>
    <div class="card-body">
    <?php
      if (isset($error)) {
        echo "<p class='alert alert-danger'>{$error}</p>";
      }
    ?>
      <form action="index.php" method="POST">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button name="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>
  </div>
</div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>