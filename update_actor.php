<!DOCTYPE HTML>
<html>
<head>
  <title>Update Actor Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_actor.php" method="POST">

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
  
    <input class= "submit" type="submit" name="submit" value="Update">
   
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
    $sql = ("UPDATE actor SET first_name = '$first_name' ,last_name ='$last_name' ,last_update = '$last_update' WHERE actor_id = '$actor_id'") ;
     
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Data Updated Successfuly! "); 
        window.location.href = "actor.php";
    </script>';   
        echo "</strong>";

    } else {

   echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to update data due to foreign key constraints"); 
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
