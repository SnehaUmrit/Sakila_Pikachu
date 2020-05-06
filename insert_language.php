<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Language Form </title>
  <?php include 'insert.css'; ?>
</head>

<body>
 <form action="insert_language.php" method="POST">

 <header><h1>LANGUAGE</h1></header>

    <label>Language Id</label><br>
   <input type="text" name="language_id" required>
   <br><br>

    <label>Name</label><br>
    <input type="text" name="name" required>
    <br><br>

    <input class= "submit" type="submit" name="submit" value="Insert">
  
  <input type=button onClick="location.href='language.php'" value='Back'>
  <br><br>
 

<?php

include_once 'connect.php';

if (isset($_POST['submit'])){

  $language_id= $_POST['language_id'];
  $name= $_POST['name'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO language(language_id,name,last_update) VALUES ('$language_id','$name','$last_update')" ;
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "language.php";
  </script>';   
      echo "</strong>";

    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
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

