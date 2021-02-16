<?php session_start() ?>
<?php
  require_once('../include/db.php');

  if(isset($_POST['submit'])){
    $movie_name = $_POST['name'];
    $movie_description = $_POST['description'];
    $movie_category = $_POST['category'];
    $movie_date = $_POST['date'];
    $movie_rating = $_POST['rating'];

    $targetDir = "../images/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if(in_array($fileType, $allowTypes)){
      //upload to server
      if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        // Insert into database
        $sql = "INSERT INTO movies VALUES ('', :name, :description, :image, :category, :date, :rating)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
          ":name" => $movie_name,
          ":description" => $movie_description,
          ":image" => $fileName,
          ":category" => $movie_category,
          ":date" => $movie_date,
          ":rating" => $movie_rating
        ]);

        $count = $stmt->rowCount();
        if ($count > 1) {
          header("location:../home.php");
        } else {
          echo "<script>
              alert('Data gagal diinput');
            </script>";
          header("location:../home.php");
        }
      }else {
        echo "<script>
              alert('Data gagal diinput');
            </script>";
      }
    }else {
      echo "<script>
              alert('Data gagal diinput');
            </script>";
    }
  }
?>