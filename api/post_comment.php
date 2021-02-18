<?php
  require_once('../include/db.php');
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

  if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $username = $_GET['username'];
  $comment_text = $_GET['comment_text'];

  if(!$username){
    $username = "Anon";
  }else{
    $username = $_GET['username'];
  }

  $sql = "INSERT INTO comments VALUES ('', :movie_id, :username, :text)";
  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute([
    ":movie_id" => $id,
    ":username" => $username,
    ":text" => $comment_text,
  ]);
}
?>