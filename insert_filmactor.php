<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Film Actor Form </title>
  <?php include 'insert.css'; ?>
</head>

<body>
 <form action="insert_filmactor.php" method="POST">

 <header><h1>FILM ACTOR</h1></header>

    <label>Actor Id</label><br>
    <input type="text" name="actor_id" required>
    <br><br>
   
    <label>Film Id</label><br>
   <input type="text" name="film_id" required>
   <br><br>

   <input class= "submit" type="submit" name="submit" value="Insert">
  
   <input type=button onClick="location.href='film_actor.php'" value='Back'>
    <br><br>



<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $actor_id= $_POST['actor_id'];
  $film_id= $_POST['film_id'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO film_actor(actor_id,film_id,last_update) VALUES ('$actor_id','$film_id','$last_update')" ;
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "film_actor.php";
  </script>';   
      echo "</strong>";

    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
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