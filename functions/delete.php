<?php
session_start();
require_once('../include/db.php');

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "DELETE FROM movies WHERE movie_id = :id";
  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute([
    ":id" => $id,
  ]);

  if($result){
    header('location:../home.php');
  }else {
    echo "<script>
        alert('Data gagal diinput');
      </script>";
  }
}
?>