<!DOCTYPE HTML>
<html>
<head>
  <title>Update Film Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_film.php" method="POST">

 <header><h1>FILM</h1></header>
 
 <label>Film Id</label><br>
<input type="text" name="film_id" required>
<br><br>

 <label>Title</label><br>
 <input type="text" name="title" required>
 <br><br>

 <label>Description</label><br>
 <input type="text" name="description" required>
 <br><br>

 <label>Release Year</label><br>
 <input type="text" name="release_year" required>
 <br><br>

 <label>Language Id</label><br>
 <input type="text" name="language_id" required>
 <br><br>

 <label>Original Language Id</label><br>
 <input type="text" name="original_language_id" required>
 <br><br>

 <label>Rental Duration</label><br>
 <input type="text" name="rental_duration" required>
 <br><br>

 <label>Rental Rate</label><br>
 <input type="text" name="rental_rate" required>
 <br><br>

 <label>Length</label><br>
 <input type="text" name="length" required>
 <br><br>

 <label>Replacement Cost</label><br>
 <input type="text" name="replacement_cost" required>
 <br><br>

 <label>Rating</label><br>
 <input type="text" name="rating" required>
 <br><br>

 <label>Special Features</label><br>
 <input type="text" name="special_features" required>
 <br><br>

 <input class= "submit" type="submit" name="submit" value="Update">

<input type=button onClick="location.href='film.php'" value='Back'>
 <br><br>
 

<?php

include_once 'connect.php';

if (isset($_POST['submit'])){

  $film_id= $_POST['film_id'];
  $title= $_POST['title'];
  $description= $_POST['description'];
  $release_year= $_POST['release_year'];
  $language_id = $_POST['language_id'];
  $original_language_id = $_POST['original_language_id'];
  $rental_duration = $_POST['rental_duration'];
  $rental_rate = $_POST['rental_rate'];
  $length = $_POST['length'];
  $replacement_cost = $_POST['replacement_cost'];
  $rating = $_POST['rating'];
  $special_features = $_POST['special_features'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = ("UPDATE film SET title = '$title' ,description = '$description',release_year = ' $release_year' ,language_id = '$language_id' ,original_language_id = '$original_language_id ' ,rental_duration = ' $rental_duration ',rental_rate = '$rental_rate ',length = ' $length' ,replacement_cost = '$replacement_cost' ,rating = '$rating' ,special_features = '$special_features' ,last_update = ' $last_update'  WHERE film_id = '$film_id'"); 
       
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "film.php";
  </script>';   
      echo "</strong>";
    } else {

      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
      window.location.href = "film.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>
 </form>
</body>
</html>
