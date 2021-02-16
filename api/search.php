<?php 
  require_once('../include/db.php');
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

  if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM movies WHERE movie_name LIKE :keyword";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ":keyword" => '%' . $keyword . '%',
    ]);
    $count = $stmt->rowCount();

    if($count < 0){
      $response['error'] = "Movie not found, try another request";
    }else {
      while ($movies = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[] = $movies;
      }
    }
    
    echo json_encode($response);
  }
