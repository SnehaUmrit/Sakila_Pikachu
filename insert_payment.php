<!DOCTYPE HTML>
<html>
<head>
  <title>Insert Payment Form </title>
  <?php include 'insert.css'; ?>
</head>

<body>
 <form action="insert_payment.php" method="POST">

 <header><h1>PAYMENT</h1></header>

    <label>Payment Id</label><br>
    <input type="text" name="payment_id" required>
    <br><br>
    <label>Customer Id</label><br>
    <input type="text" name="customer_id" required>
    <br><br>
    <label>Staff Id</label><br>
    <input type="text" name="staff_id" required>
    <br><br>
    <label>Rental Id</label><br>
    ><input type="text" name="rental_id" required>
    <br><br>
    <label>Amount</label><br>
    <input type="text" name="amount" required>
    <br><br>
    <label>Payment Date</label><br>
    <input type="datetime-local" name="payment_date" placeholder= "yyyy-mm-dd hh:mm:ss" required>
    <br><br>
    <input class= "submit" type="submit" name="submit" value="Insert">
  <input type=button onClick="location.href='payment.php'" value='Back'>
  <br><br>

<?php

include_once 'connect.php';

if (isset($_POST['submit'])){
  $payment_id= $_POST['payment_id'];
  $customer_id= $_POST['customer_id'];
  $staff_id= $_POST['staff_id'];
  $rental_id= $_POST['rental_id'];
  $amount= $_POST['amount'];
  $payment_date= $_POST['payment_date'];

    $last_update = date('Y-m-d H:i:s');
    //Insert query 
    $sql = "INSERT INTO payment(payment_id,customer_id,staff_id,rental_id, amount,payment_date,last_update) VALUES ('$payment_id','$customer_id','$staff_id','$rental_id','$amount','$payment_date','$last_update')" ;
    
    if (mysqli_query($conn, $sql)) {
      echo "<strong>";
      echo '<script type="text/javascript"> 
      alert("New record created successfully! "); 
      window.location.href = "payment.php";
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
