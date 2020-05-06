<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Actor Form </title> 
  <?php include 'insert.css'; ?>
</head>

<body>

 <form action="insert_actor.php" method="POST">

 <header><h1>ACTOR</h1></header>
  
    <label>Actor Id</label><br>
    <input class= "input" type="text" name="actor_id" required>
    <br><br>
  
    <label>First Name</label><br>
    <input class= "input" type="text" name="first_name" required>
    <br><br>

    <label>Last Name</label><br>
    <input class= "input" type="text" name="last_name" required>
    <br><br>
  
    <input class= "submit" type="submit" name="submit" value="Insert">
   
   <input type=button onClick="location.href='actor.php'" value='Back'>
  <br><br>

<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $actor_id = $_POST['actor_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];

    $last_update = date('Y-m-d H:i:s');

    //Insert query 
    $sql = "INSERT INTO actor(actor_id,first_name,last_name,last_update) VALUES ('$actor_id','$first_name','$last_name', '$last_update')" ;
     
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("New record created successfully! "); 
        window.location.href = "actor.php";
    </script>';   
        echo "</strong>";

    } else {
      echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to insert data due to foreign key constraints"); 
        window.location.href = "actor.php";
        </script>';
        echo "</strong>";
    }
}
mysqli_close($conn);

?>
  </form>
</body>
</html>