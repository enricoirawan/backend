<?php 
  require_once('../include/db.php');
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

  if(isset($_GET)){
    $category = $_GET['category'];
    $sql = "SELECT * FROM movies WHERE movie_category = :category";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ":category" => $category,
    ]);
    $response = [];

    while($movies = $stmt->fetch(PDO::FETCH_ASSOC)){
      $response[] = $movies;
    }
    
    echo json_encode($response);
  }
?>