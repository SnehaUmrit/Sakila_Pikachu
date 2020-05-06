
<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Country Form </title>
  <?php include 'insert.css'; ?>
</head>

<body>
 <form action="insert_country.php" method="POST">

 <header><h1>COUNTRY</h1></header>
  
    <label>Country Id</label>
    <input type="text" name="country_id" required>
    <br><br>
  
    <label>Country</label>
    <input type="text" name="country" required>
   <br><br>
  
    <input class= "submit" type="submit" name="submit" value="Insert">

    <input type=button onClick="location.href='country.php'" value='Back'>
    <br><br>
<?php

include_once 'connect.php';

if (isset($_POST['submit'])){

  $country_id = $_POST['country_id'];
  $country = $_POST['country'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO country(country_id,country,last_update) VALUES ('$country_id','$country', '$last_update')" ;
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "country.php";
  </script>';   
      echo "</strong>";

    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
      window.location.href = "country.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);

?>
 </form>
</body>
</html>