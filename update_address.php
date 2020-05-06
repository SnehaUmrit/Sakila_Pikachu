
<!DOCTYPE HTML>
<html>
<head>
  <title>Update Address Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_address.php" method="POST">

 <header><h1>ADDRESS</h1></header>
 
    <label>Address Id</label><br>
    <input class = "input" type="text" name="address_id" required>
    <br><br>
  
    <label>Address</label><br>
    <input class= "input" type="text" name="address" required>
    <br><br>
   
    <label>Address2</label><br>
    <input class = "input" type="text" name="address2">
    <br><br>
   
    <label>District</label><br>
    <input class="input" type="text" name="district">
    <br><br>
   
    <label>City Id</label><br>
    <input class= "input" type="text" name="city_id" required>
    <br><br>

    <label>Postal Code:</label><br>
    <input class="input" type="text" name="postal_code">
    <br><br>
   
    <label>Phone</label><br>
    <input class= "input" type="phone" name="phone">
    <br><br>
  
    <input class= "submit" type="submit" name="submit" value="Update">
   
    <input type=button onClick="location.href='address.php'" value='Back'>
    <br><br>



<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $address_id = $_POST['address_id'];
  $address = $_POST['address'];
  $address2 = $_POST['address2'];
  $district = $_POST['district'];
  $city_id = $_POST['city_id'];
  $postal_code = $_POST['postal_code'];
  $phone = $_POST['phone'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql =("UPDATE address SET address = '$address',address2 ='$address2' ,district='$district',city_id = '$city_id',postal_code ='$postal_code' ,phone = '$phone',last_update = '$last_update' WHERE address_id ='$address_id' "); 
      
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "address.php";
  </script>';   
      echo "</strong>";
    } else {

      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
      window.location.href = "address.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);

?>
 </form>
</body>
</html>