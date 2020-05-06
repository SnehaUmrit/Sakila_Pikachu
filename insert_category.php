<html>
<head>
  <title>Insert category Form</title>
  <?php include 'insert.css'; ?>
</head>

</style>
<body>
 <form action="insert_category.php" method="POST">

 <header><h1>CATEGORY</h1></header>
  
    <label>Category Id</label><br>
    <input class="input" type="text" name="category_id" required>
    <br><br>
   
    <label>Name</label>
    <td><input class= "input" type="text" name="name" required></td>
    <br><br>
    
    <input class= "submit" type="submit" name="submit" value="Insert">
  
   <input type=button onClick="location.href='category.php'" value='Back'>
    <br><br>



<?php

include_once 'connect.php';
if (isset($_POST['submit'])){
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO category(category_id,name,last_update) VALUES ('$category_id','$name', '$last_update')" ;
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "category.php";
  </script>';   
      echo "</strong>";

    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
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
