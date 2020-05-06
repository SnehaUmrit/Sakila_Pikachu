<html>

<head>
  <title>Customer</title> 
</head>

<body>
<h1><img src="pokeball.jpg" width = "60" height = "60" style="vertical-align:bottom"> CUSTOMER <img src="pikachu.gif" width = "110" height = "80" style="vertical-align:bottom"></h1>

<form method="post" action="">

<?php	
      $field = array("customer_id","store_id", "first_name","last_name","email" ,"address_id","active","create_date", "last_update");
        
      if(!empty($_POST['field'])) {
        $field = $_POST['field'];
      }
?> 
<h2>Select at least 1 field to display:</h2>
    
<h3>
    <p class="a">
    <label><input type="checkbox" name="field[]" value="customer_id" <?php echo (in_array('customer_id',$field)) ?'checked':'' ?> > Customer Id</input></label>
    <label><input type="checkbox" name="field[]" value="store_id" <?php echo (in_array('store_id',$field)) ?'checked':'' ?> > Store Id</input></label>
    <label><input type="checkbox" name="field[]" value="first_name" <?php echo (in_array('first_name',$field)) ?'checked':'' ?> > First Name</input></label>
    <label><input type="checkbox" name="field[]" value="last_name" <?php echo (in_array('last_name',$field)) ?'checked':'' ?> > Last Name</input></label>
    <label><input type="checkbox" name="field[]" value="email" <?php echo (in_array('email',$field)) ?'checked':'' ?> > Email</input></label>
    <label><input type="checkbox" name="field[]" value="address_id" <?php echo (in_array('address_id',$field)) ?'checked':'' ?> > Address Id</input></label>
    <label><input type="checkbox" name="field[]" value="active" <?php echo (in_array('active',$field)) ?'checked':'' ?> > Active</input></label>
    <label><input type="checkbox" name="field[]" value="create_date" <?php echo (in_array('create_date',$field)) ?'checked':'' ?> > Create Date</input></label>
    <label><input type="checkbox" name="field[]" value="last_update" <?php echo (in_array('last_update',$field)) ?'checked':'' ?> > Last Update</input></label>
    </p>
</h3>

    <input type="submit" value="Select" name="submit"></input></form>
    <button onclick = "location.href='insert_customer.php'">Insert</button>

<?php
			include 'table.css';
			include 'back.php';    
			include_once 'connect.php';
  			$sql = "SELECT * FROM customer";
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
	
          echo '<td><a href="update_customer.php"><button>Update</button></a>  <a href="customer.php?customer_id=' .$row["customer_id"]. '"><button>Delete</button></a> </td>';
          
                  }
                    echo "</tr>";
                }

                echo"</table>";
        }    

        else {
                echo "0 results";
        }
            

if (isset($_GET['customer_id'])){
    $customer_id = intval($_GET['customer_id']);

    $delete = mysqli_query($conn,"DELETE FROM customer WHERE customer_id = '$customer_id'");

      if ($delete) {
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Record deleted successfully! "); 
        window.location.href = "customer.php";
    </script>';
    echo "</strong>";
      } else {
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to delete data due to foreign key constraints "); 
        window.location.href = "customer.php";
    </script>';
    echo "</strong>";
      }
   }
   mysqli_close($conn);
  
?>          
 
</body>
</html>