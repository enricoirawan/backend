<?php
  require_once('../include/db.php');
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $comment_text = $_POST['comment_text'];

  if(!$username){
    $username = "Anon";
  }else{
    $username = $_POST['username'];
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