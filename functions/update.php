<?php
  session_start();
  require_once('../include/db.php');

  if(isset($_POST['submit'])){
    $movie_id = $_POST['id'];
    $movie_name = $_POST['name'];
    $movie_description = $_POST['description'];
    $movie_category = $_POST['category'];
    $movie_date = $_POST['date'];
    $movie_rating = $_POST['rating'];

    $old_image = $_POST['image'];

    $targetDir = "../images/";

    //cek apakah ada foto baru yang diupload
    if ($_FILES['new_image']['error'] == 4) {
      // pakai image yang lama
      $fileName = $old_image;
      // insert to database
      $sql = "UPDATE movies SET movie_name = :name, movie_description = :description, movie_category = :category, date_release = :date, movie_rating = :rating, movie_image = :image WHERE movie_id = :id";
      $stmt = $pdo->prepare($sql);
      $result = $stmt->execute([
        ":name" => $movie_name,
        ":description" => $movie_description,
        ":image" => $fileName,
        ":category" => $movie_category,
        ":date" => $movie_date,
        ":rating" => $movie_rating,
        ":id" => $movie_id,
      ]);

      if ($result) {
        header("location:../home.php");
      } else {
        echo "<script>
                    alert('Data gagal diinput');
                  </script>";
        header("location:../home.php");
      }

    } else {
      // pakai image yang baru
      $fileName = basename($_FILES["new_image"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

      if (in_array($fileType, $allowTypes)) {
        //upload to server
        if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFilePath)) {
          // Insert into database
          $sql = "UPDATE movies SET movie_name = :name, movie_description = :description, movie_category = :category, date_release = :rating, movie_rating = :rating, movie_image = :image WHERE movie_id = :id";
          $stmt = $pdo->prepare($sql);
          $result = $stmt->execute([
            ":name" => $movie_name,
            ":description" => $movie_description,
            ":image" => $fileName,
            ":category" => $movie_category,
            ":date" => $movie_date,
            ":rating" => $movie_rating,
            ":id" => $movie_id,
          ]);

          if ($result) {
            header("location:../home.php");
          } else {
            echo "<script>
                  alert('Data gagal diinput');
                </script>";
            header("location:../home.php");
          }
        } else {
          echo "<script>
                  alert('Data gagal diinput');
                </script>";
        }
      } else {
        echo "<script>
                  alert('Data gagal diinput');
                </script>";
      }
    }
  }
?>