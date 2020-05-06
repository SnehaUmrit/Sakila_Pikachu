<!DOCTYPE HTML>
<html>
<head>
  <title>Update Language Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_language.php" method="POST">

 <header><h1>LANGUAGE</h1></header>

    <label>Language Id</label><br>
   <input type="text" name="language_id" required>
   <br><br>

    <label>Name</label><br>
    <input type="text" name="name" required>
    <br><br>

    <input class= "submit" type="submit" name="submit" value="Update">
  
  <input type=button onClick="location.href='language.php'" value='Back'>
  <br><br>


<?php

include_once 'connect.php';

if (isset($_POST['submit'])){

  $language_id= $_POST['language_id'];
  $name= $_POST['name'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = ("UPDATE language SET name ='$name' ,last_update ='$last_update'  WHERE language_id = '$language_id'");
      
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "language.php";
  </script>';   
      echo "</strong>";
    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
      window.location.href = "language.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>

</form>
</body>
</html>
