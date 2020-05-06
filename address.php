<html>

<head>
  <title>Address</title> 
</head>

<body>
<h1><img src="pokeball.jpg" width = "60" height = "60" style="vertical-align:bottom"> ADDRESS <img src="pikachu.gif" width = "110" height = "80" style="vertical-align:bottom"></h1>

<form method="post" action="">

<!-- CHANGE STARTS----->
<?php
    $field = array("address_id","address", "address2","district","city_id" ,"postal_code","phone","last_update");

     if(!empty($_POST['field'])) {
            $field = $_POST['field'];
    }
?>
<h2>Select at least 1 field to display:</h2>

<h3>
    <p class="a">    
    <label><input type="checkbox" name="field[]" value="address_id" <?php echo (in_array('address_id',$field)) ?'checked':'' ?> > Address Id</input></label>
    <label><input type="checkbox" name="field[]" value="address" <?php echo (in_array('address',$field)) ?'checked':'' ?> > Address</input></label>
    <label><input type="checkbox" name="field[]" value="address2" <?php echo (in_array('address2',$field)) ?'checked':'' ?> > Address 2</input></label>
    <label><input type="checkbox" name="field[]" value="district" <?php echo (in_array('district',$field)) ?'checked':'' ?> > District</input></label>
    <label><input type="checkbox" name="field[]" value="city_id" <?php echo (in_array('city_id',$field)) ?'checked':'' ?> > City Id</input></label>
    <label><input type="checkbox" name="field[]" value="postal_code" <?php echo (in_array('postal_code',$field)) ?'checked':'' ?> > Postal Code</input></label>
    <label><input type="checkbox" name="field[]" value="phone" <?php echo (in_array('phone',$field)) ?'checked':'' ?> > Phone</input></label>
    <label><input type="checkbox" name="field[]" value="last_update" <?php echo (in_array('last_update',$field)) ?'checked':'' ?> > Last Update</input></label>
    </p>
</h3>

    <input type="submit" value="Select" name="submit"></input></form>
    <button onclick = "location.href='insert_address.php'">Insert</button>
    
<?php	
            include 'table.css';
			include 'back.php';           			
      include_once 'connect.php';
      

  			$sql = "SELECT * FROM address";
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
					
					echo '<td><a href="update_address.php"><button>Update</button></a>  <a href="address.php?address_id=' .$row["address_id"]. '"><button>Delete</button></a> </td>';	
                    
                }
                echo "</tr>";           
              }
             
              echo"</table>";
          }
          
          else {
              echo "0 results";
          }
if (isset($_GET['address_id'])){
    $address_id = intval($_GET['address_id']);

    $delete = mysqli_query($conn,"DELETE FROM address WHERE address_id = '$address_id'");

      if ($delete) {
        //echo '<script>alert("Record deleted successfully!");</script>';
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Record deleted successfully! "); 
        window.location.href = "address.php";
    </script>';
    echo "</strong>";
      } else {
        //$msg = "Error: Unable to delete data due to foreign key constraints";
        //echo '<script>alert("'. $msg .'");</script>';
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to delete data due to foreign key constraints "); 
        window.location.href = "address.php";
    </script>';
    echo "</strong>";
      }
   }
   mysqli_close($conn);

  
  
?>          

</body>
</html>