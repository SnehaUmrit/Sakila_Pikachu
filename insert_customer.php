<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Customer Form </title>
  <?php include 'insert.css'; ?>
</head>

<body>
 <form action="insert_customer.php" method="POST">

 <header><h1>CUSTOMER</h1></header>

    <label>Customer Id</label><br>
    <input type="text" name="customer_id" required>
    <br><br>
   
    <label>Store Id</label><br>
    <input type="text" name="store_id" required>
    <br><br>
   
    <label>First Name</label><br>
    <input type="text" name="first_name" required>
    <br><br>

    <label>Last Name</label><br>
    <input type="text" name="last_name" required>
   <br><br>

    <label>Email</label><br>
    <input type="email" name="email" required>
   <br><br>

    <label>Address Id</label><br>
    <input type="text" name="address_id" required>
    <br><br>

    <label>Active</label><br>
    <input type="number" name="active" min="0" max="1" required>
   <br><br>

    <label>Create date</label><br>
    <input type="datetime-local" name="create_date" placeholder= "yyyy-mm-dd hh:mm:ss"  required>
    <br><br>

    <input class= "submit" type="submit" name="submit" value="Insert">

    <input type=button onClick="location.href='customer.php'" value='Back'>
    <br><br>
<?php

include_once 'connect.php';

if (isset($_POST['submit'])){

  $customer_id = $_POST['customer_id'];
  $store_id = $_POST['store_id'];
  $first_name = $_POST['first_name'];
  $last_name= $_POST['last_name'];
  $email= $_POST['email'];
  $address_id= $_POST['address_id'];
  $active = $_POST['active'];
  $create_date = $_POST['create_date'];
 
    //$create_date = date('Y-m-d H:i:s',filectime("insert_customer.php"));
    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO customer(customer_id,store_id,first_name,last_name,email, address_id,active,create_date,last_update) VALUES ('$customer_id','$store_id','$first_name','$last_name','$email','$address_id','$active','$create_date','$last_update')" ;
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "customer.php";
  </script>';   
      echo "</strong>";


    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
      window.location.href = "customer.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>
   
 
   </form>
</body>
</html>