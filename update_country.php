
<!DOCTYPE HTML>
<html>
<head>
  <title>Update Country Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_country.php" method="POST">

 <header><h1>COUNTRY</h1></header>
  
    <label>Country Id</label>
    <input type="text" name="country_id" required>
    <br><br>
  
    <label>Country</label>
    <input type="text" name="country" required>
   <br><br>
  
    <input class= "submit" type="submit" name="submit" value="Update">

    <input type=button onClick="location.href='country.php'" value='Back'>
    <br><br>


<?php

include_once 'connect.php';

if (isset($_POST['submit'])){

  $country_id = $_POST['country_id'];
  $country = $_POST['country'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql =( "UPDATE country SET country = '$country' ,last_update ='$last_update'  WHERE country_id='$country_id'" );
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "country.php";
  </script>';   
      echo "</strong>";
    } else {

      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
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