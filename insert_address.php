<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Address Form </title>
   <?php include 'insert.css'; ?>
</head>

<body>

 <form action="insert_address.php" method="POST">
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
  
    <input class= "submit" type="submit" name="submit" value="Insert">
   
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
    $sql = "INSERT INTO address(address_id,address,address2,district,city_id, postal_code,phone,last_update) VALUES ('$address_id','$address','$address2','$district','$city_id','$postal_code','$phone', '$last_update')" ;
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "address.php";
  </script>';   
      echo "</strong>";


    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
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