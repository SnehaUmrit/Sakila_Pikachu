<!DOCTYPE HTML>
<html>
<head>
  <title>Update Film Category Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_filmcategory.php" method="POST">

 <header><h1>FILM CATEGORY</h1></header>
 
    <label>Film Id</label><br>
    <input type="text" name="film_id" required>
   <br><br>

    <label>Category Id</label><br>
   <input type="text" name="category_id" required>
   <br><br>
 
    <input class= "submit" type="submit" name="submit" value="Update">
  
  <input type=button onClick="location.href='film_category.php'" value='Back'>
  <br><br>



<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $film_id = $_POST['film_id'];
  $category_id= $_POST['category_id'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = ("UPDATE film_category SET category_id = '$category_id',last_update ='$last_update'  WHERE film_id = '$film_id'"); 
    
    
    if (mysqli_query($conn, $sql)) {
   echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "film_category.php";
  </script>';   
      echo "</strong>";
    } else {

      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
      window.location.href = "film_category.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>
 </form>
</body>
</html>