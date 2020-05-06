<!DOCTYPE HTML>
<html>
<head>
  <title>Update Film Actor Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_filmactor.php" method="POST">
 <header><h1>FILM ACTOR</h1></header>

<label>Actor Id</label><br>
<input type="text" name="actor_id" required>
<br><br>

<label>Film Id</label><br>
<input type="text" name="film_id" required>
<br><br>

<input class= "submit" type="submit" name="submit" value="Update">

<input type=button onClick="location.href='film_actor.php'" value='Back'>
<br><br>




<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $actor_id= $_POST['actor_id'];
  $film_id= $_POST['film_id'];

  

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = ("UPDATE film_actor SET film_id = '$film_id',last_update = '$last_update' WHERE actor_id ='$actor_id'");
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "film_actor.php";
  </script>';   
      echo "</strong>";
    } else {

      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
      window.location.href = "film_actor.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>
 </form>
</body>
</html>