<!DOCTYPE HTML>
<html>
<head>
  <title>Update Inventory Form </title>
  <?php include 'update.css'; ?>
</head>

<body>
 <form action="update_inventory.php" method="POST">

 <header><h1>INVENTORY</h1></header>
 
    <label>Inventory Id:</label><br>
    <input type="text" name="inventory_id" required>
    <br><br>
    <label>Film Id:</label><br>
    <input type="text" name="film_id" required>
    <br><br>
    <label>Store Id</label><br>
    <input type="text" name="store_id" required>
    <br><br>
    <input class= "submit" type="submit" name="submit" value="Update">
  
  <input type=button onClick="location.href='inventory.php'" value='Back'>
  <br><br>


<?php
include_once 'connect.php';

if (isset($_POST['submit'])){
  $inventory_id = $_POST['inventory_id'];
  $film_id= $_POST['film_id'];
  $store_id= $_POST['store_id'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = ("UPDATE inventory SET film_id = '$film_id',store_id ='$store_id' ,last_update ='$last_update'  WHERE inventory_id = '$inventory_id' ");
       
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Data Updated Successfuly! "); 
      window.location.href = "inventory.php";
  </script>';   
      echo "</strong>";
    } else {

      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to update data due to foreign key constraints"); 
      window.location.href = "inventory.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>
 </form>
</body>
</html>
