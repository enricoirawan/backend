<?php 
  require_once('../include/db.php');

  if(isset($_GET)){
    $sql = "SELECT * FROM movies";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $response = [];

    while($movies = $stmt->fetch(PDO::FETCH_ASSOC)){
      $response[] = $movies;
    }
    
    echo json_encode($response);
  }
?>