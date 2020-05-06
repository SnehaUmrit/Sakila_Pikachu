<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Rental Form </title>
  <?php include 'insert.css'; ?>
</head>

<body>
 <form action="insert_rental.php" method="POST">

 <header><h1>RENTAL</h1></header>
 
    <label>Rental Id</label><br>
   <input type="text" name="rental_id" required>
   <br><br>
    <label>Rental Date</label><br>
    <input type="datetime-local" name="rental_date" required>
    <br><br>
    <label>Inventory Id</label><br>
   <input type="text" name="inventory_id" required>
   <br><br>
    <label>Customer Id</label><br>
    <input type="text" name="customer_id" required>
    <br><br>
    <label>Return Date</label><br>
    <input type="datetime-local" name="return_date" placeholder= "yyyy-mm-dd hh:mm:ss" required>
    <br><br>
    <label>Staff Id</label><br>
    <input type="text" name="staff_id" required>
    <br><br>
   <input class= "submit" type="submit" name="submit" value="Insert">
 
 <input type=button onClick="location.href='rental.php'" value='Back'>
 <br><br>


<?php
include_once 'connect.php';

if (isset($_POST['submit'])){
  $rental_id = $_POST['rental_id'];
  $rental_date = $_POST['rental_date'];
  $inventory_id = $_POST['inventory_id'];
  $customer_id = $_POST['customer_id'];
  $return_date = $_POST['return_date'];
  $staff_id = $_POST['staff_id'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO rental(rental_id,rental_date,inventory_id, customer_id,return_date,staff_id,last_update) VALUES ('$rental_id','$rental_date','$inventory_id ','$customer_id','$return_date','$staff_id','$last_update')" ;
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "rental.php";
  </script>';   
      echo "</strong>";

    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
      window.location.href = "rental.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>

</form>
</body>
</html>