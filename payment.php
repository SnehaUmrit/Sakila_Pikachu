<html>

<head>
  <title>Payment</title> 
</head>

<body>
<h1><img src="pokeball.jpg" width = "60" height = "60" style="vertical-align:bottom"> PAYMENT <img src="pikachu.gif" width = "110" height = "80" style="vertical-align:bottom"></h1>

<form method="post" action="">

<?php
    $field = array("payment_id","customer_id", "staff_id", "rental_id", "amount", "payment_date", "last_update");

     if(!empty($_POST['field'])) { 
            $field = $_POST['field'];
    }
?>

<h2>Select at least 1 field to display:</h2>

<h3>
    <p class="a">
    <label><input type="checkbox"  name='field[]'  value="payment_id" <?php echo (in_array('payment_id',$field)) ?'checked':'' ?> > Payment Id</label>
    <label><input type="checkbox"  name='field[]' value="customer_id" <?php echo (in_array('customer_id',$field)) ?'checked':'' ?> > Customer Id</label>
    <label><input type="checkbox"  name='field[]' value="staff_id" <?php echo (in_array('staff_id',$field)) ?'checked':'' ?> > Staff Id</label>
    <label><input type="checkbox"  name='field[]' value="rental_id" <?php echo (in_array('rental_id',$field)) ?'checked':'' ?> > Rental Id</label>
    <label><input type="checkbox"  name='field[]' value="amount" <?php echo (in_array('amount',$field)) ?'checked':'' ?> > Amount</label>
    <label><input type="checkbox"  name='field[]' value="payment_date" <?php echo (in_array('payment_date',$field)) ?'checked':'' ?> > Payment Date</label>
    <label><input type="checkbox"  name='field[]' value="last_update" <?php echo (in_array('last_update',$field)) ?'checked':'' ?> > Last Update</label>
    </p>
</h3>

    <input type="submit" value="Select" name="submit"></input></form>
    <button class ="button1" onclick = "location.href='insert_payment.php'">Insert</button>

<?php	
			include 'table.css';
			include 'back.php';    
            include_once 'connect.php'; 
      		$sql = "SELECT * FROM payment";
        	$result = $conn->query($sql);

            if ($result->num_rows > 0) {
            	echo "<table>";
              echo "<tr>";

              if(isset($_POST['submit'])){
                if(!empty($_POST['field'])) {                                        
                    foreach($_POST['field'] as $value){
                      echo "<th>".ucwords(str_replace("_", " ", $value))."</th>";                                                  
                    }                  
                    echo "<th>Option</th>";             
                  }
                }
              while($row = $result->fetch_assoc()) {                   
                  echo "<tr>";
                 
                    if(isset($_POST['submit'])){
                      if(!empty($_POST['field'])) {                         
                          foreach($_POST['field'] as $value){
                            $v = is_null($row["$value"])? 'NULL' : $row["$value"]; 
                            echo "<td>".$v."</td>";                                                                    
                          }               
                      }
                      echo '<td><a href="update_payment.php"><button>Update</button></a>  <a href="payment.php?payment_id=' .$row["payment_id"].'"><button>Delete</button></a> </td>';
                  }  
                  echo "</tr>";           
                }
               
                echo"</table>";
            }
            
            else {
                echo "0 results";
            }
            
if (isset($_GET['payment_id'])){
    $payment_id = intval($_GET['payment_id']);
    
    $delete = mysqli_query($conn,"DELETE FROM payment WHERE payment_id = '$payment_id'");

      if ($delete) {
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Record deleted successfully! "); 
        window.location.href = "payment.php";
    </script>'; 
        echo "</strong>";  
      } 
      
      else { 
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to delete data due to foreign key constraints "); 
        window.location.href = "payment.php";
        </script>';
        echo "</strong>";
      }
   }
   mysqli_close($conn);
  
?>

</body>
</html>