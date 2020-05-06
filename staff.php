<html>

<head>
  <title>Staff</title> 
</head>

<body>
<h1><img src="pokeball.jpg" width = "60" height = "60" style="vertical-align:bottom"> STAFF <img src="pikachu.gif" width = "110" height = "80" style="vertical-align:bottom"></h1>

<form method="post" action="">

<?php
    $field = array("staff_id","first_name", "last_name", "address_id", "picture", "email", "store_id", "active", "username", "password", "last_update"); 

     if(!empty($_POST['field'])) { 
            $field = $_POST['field'];
    }
?>

<h2>Select at least 1 field to display:</h2>

<h3>
    <p class="a">
    <label><input type="checkbox"  name='field[]'  value="staff_id" <?php echo (in_array('staff_id',$field)) ?'checked':'' ?> > Staff Id</label>
    <label><input type="checkbox"  name='field[]' value="first_name" <?php echo (in_array('first_name',$field)) ?'checked':'' ?> > First Name</label>
    <label><input type="checkbox"  name='field[]' value="last_name" <?php echo (in_array('last_name',$field)) ?'checked':'' ?> > Last Name</label>
    <label><input type="checkbox"  name='field[]' value="address_id" <?php echo (in_array('address_id',$field)) ?'checked':'' ?> > Address Id</label>
    <label><input type="checkbox"  name='field[]' value="picture" <?php echo (in_array('picture',$field)) ?'checked':'' ?> > Picture</label>
    <label><input type="checkbox"  name='field[]' value="email" <?php echo (in_array('email',$field)) ?'checked':'' ?> > Email</label>
    <label><input type="checkbox"  name='field[]' value="store_id" <?php echo (in_array('store_id',$field)) ?'checked':'' ?> > Store Id</label>
    <label><input type="checkbox"  name='field[]' value="active" <?php echo (in_array('active',$field)) ?'checked':'' ?> > Active</label>
    <label><input type="checkbox"  name='field[]' value="username" <?php echo (in_array('username',$field)) ?'checked':'' ?> > Username</label>
    <label><input type="checkbox"  name='field[]' value="password" <?php echo (in_array('password',$field)) ?'checked':'' ?> > Password</label>
    <label><input type="checkbox"  name='field[]' value="last_update" <?php echo (in_array('last_update',$field)) ?'checked':'' ?> > Last Update</label>
    </p>
</h3>

    <input type="submit" value="Select" name="submit"></input></form>
    <button class ="button1" onclick = "location.href='insert_staff.php'">Insert</button>

<?php	
			include 'table.css';
			include 'back.php';    
            include_once 'connect.php'; 
      		$sql = "SELECT * FROM staff";
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
                      echo '<td><a href="update_staff.php"><button>Update</button></a>  <a href="staff.php?staff_id=' .$row["staff_id"].'"><button>Delete</button></a> </td>';
                  }  
                  echo "</tr>";           
                }
               
                echo"</table>";
            }
            
            else {
                echo "0 results";
            }
            
if (isset($_GET['staff_id'])){
    $staff_id = intval($_GET['staff_id']);
    
    $delete = mysqli_query($conn,"DELETE FROM staff WHERE staff_id = '$staff_id'");

      if ($delete) {
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Record deleted successfully! "); 
        window.location.href = "staff.php";
    </script>'; 
        echo "</strong>";  
      } 
      
      else { 
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to delete data due to foreign key constraints "); 
        window.location.href = "staff.php";
        </script>';
        echo "</strong>";
      }
   }
   mysqli_close($conn);
  
?>

</body>
</html>