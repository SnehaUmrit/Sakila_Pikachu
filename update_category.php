<html>
<head>
  <title>Update Category Form</title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_category.php" method="POST">

<header><h1>CATEGORY</h1></header>
 
   <label>Category Id</label><br>
   <input class="input" type="text" name="category_id" required>
   <br><br>
  
   <label>Name</label>
   <td><input class= "input" type="text" name="name" required></td>
   <br><br>
   

   <input class= "submit" type="submit" name="submit" value="Update">
 
  <input type=button onClick="location.href='category.php'" value='Back'>
  <br><br>

<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];

    $last_update = date('Y-m-d H:i:s');
    //
    $sql = ("UPDATE category SET name ='$name' ,last_update ='$last_update' WHERE category_id = '$category_id'") ;
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "category.php";
  </script>';   
      echo "</strong>";
    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
      window.location.href = "category.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);

?>
</form>
</body>
</html>