<?php
require_once('../include/db.php');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM comments WHERE movie_id = :movie_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ":movie_id" => $id,
  ]);
  $count = $stmt->rowCount();
  $response = [];

  if($count == 0 || $count == null){
    $response = [];
  }else {
    while ($comments = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $response[] = $comments;
    }
  }

  echo json_encode($response);
}
?>