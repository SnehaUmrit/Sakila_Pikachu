<!DOCTYPE HTML>
<html>
<head>
  <title>Insert City Form </title>
  <?php include 'insert.css'; ?>

</head>

<body>

 <form action="insert_city.php" method="POST">

 <header><h1>CITY</h1></header>
 
    <label>City Id</label><br>
    <input type="text" name="city_id" required>
    <br><br>
  
    <label>City</label><br>
    <input type="text" name="city" required>
    <br><br>
  
    <label>Country Id:</label><br>
    <input type="text" name="country_id" required>
    <br><br>
   
  
    <input class= "submit" type="submit" name="submit" value="Insert">
    <input type=button onClick="location.href='city.php'" value='Back'>
    <br><br>

<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $city_id = $_POST['city_id'];
  $city = $_POST['city'];
  $country_id = $_POST['country_id'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO city(city_id,city,country_id,last_update) VALUES ('$city_id','$city','$country_id', '$last_update')" ;
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "city.php";
  </script>';   
      echo "</strong>";


    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
      window.location.href = "city.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);

?>
</form>
</body>
</html>