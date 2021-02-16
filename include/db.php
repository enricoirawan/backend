<?php
  $dsn = "mysql:host=localhost;dbname=movie_app";

  try{
    $pdo = new PDO($dsn, "root", "");
  }catch(PDOException $e){
    echo $e->getMessage();
  }
