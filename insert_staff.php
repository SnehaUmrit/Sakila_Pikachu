<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Staff Form </title>
  <?php include 'insert.css'; ?>
</head>

<body>
 <form action="insert_staff.php" method="POST">

 <header><h1>STAFF</h1></header>
 
    <label>Staff Id</label><br>
   <input type="text" name="staff_id" required>
   <br><br>
    <label>First Name</label><br>
    <input type="text" name="first_name" required>
    <br><br>
    <label>Last Name</label><br>
    <input type="text" name="last_name" required>
    <br><br>
    <label>Address Id</label><br>
    <input type="text" name="address_id" required>
    <br><br>
    <label>Picture</label><br>
    <input type="file" id="img" name="picture" accept="image/*">
    <br><br>
    <label>Email</label><br>
    <input type="email" name="email" placeholder = "firstname.lastname@sakilastaff.com" required>
    <br><br>
    <label>Store Id</label><br>
    <input type="text" name="store_id" required>
    <br><br>
    <label>Active</label><br>
    <input type="number" name="active" min="0" max="1" required>
    <br><br>
    <label>Username</label><br>
    <input type="text" name="username" required>
    <br><br>
    <label>Password</label><br>
    <input type="password" name="password" required>
    <br><br>
    <input class= "submit" type="submit" name="submit" value="Insert">
  
   <input type=button onClick="location.href='staff.php'" value='Back'>
   <br><br>


<?php

include_once 'connect.php';
if (isset($_POST['submit'])){
  $staff_id= $_POST['staff_id'];
  $first_name= $_POST['first_name'];
  $last_name= $_POST['last_name'];
  $address_id= $_POST['address_id']; 
  $picture = $_POST['picture'];
  $email= $_POST['email'];
  $store_id= $_POST['store_id'];
  $active= $_POST['active'];
  $username= $_POST['username'];
  $password= $_POST['password'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO staff(staff_id,first_name,last_name,address_id, picture,email,store_id,active, username,password,last_update) VALUES ('$staff_id','$first_name','$last_name','$address_id','$picture','$email','$store_id','$active','$username','$password','$last_update')" ;
    
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "staff.php";
  </script>';   
      echo "</strong>";

    } else {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("Error: Unable to insert data due to foreign key constraints"); 
      window.location.href = "staff.php";
      </script>';
      echo "</strong>";
    }
}
mysqli_close($conn);
?>

</form>
</body>
</html>
