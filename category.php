<html>
<head>
  <title>Category</title> 
</head>

<body>
<h1><img src="pokeball.jpg" width = "60" height = "60" style="vertical-align:bottom"> CATEGORY <img src="pikachu.gif" width = "110" height = "80" style="vertical-align:bottom"></h1>

<form method="post" action="">

<?php
    $field = array("category_id","name","last_update");

     if(!empty($_POST['field'])) {
            $field = $_POST['field'];
    }
?>
<h2>Select at least 1 field to display:</h2>
<h3>
    <p class="a">
    <label><input type="checkbox"  name='field[]'  value="category_id" <?php echo (in_array('category_id',$field)) ?'checked':'' ?> > Category Id</label>
    <label><input type="checkbox"  name='field[]' value="name" <?php echo (in_array('name',$field)) ?'checked':'' ?> > Name</label>
    <label><input type="checkbox"  name='field[]' value="last_update" <?php echo (in_array('last_update',$field)) ?'checked':'' ?> > Last Update</label>
    </p>
</h3>

    <input type="submit" value="Select" name="submit"></input></form>
    <button onclick = "location.href='insert_category.php'">Insert</button>

<?php	
			include 'table.css';
			include 'back.php';
			include_once 'connect.php';
  			$sql = "SELECT * FROM category";
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
                    echo '<td><a href="update_category.php"><button>Update</button></a>  <a href= "category.php?category_id=' .$row["category_id"]. '"><button>Delete</button></a> </td>';
                    }
                    echo "</tr>";
                }
                
                echo"</table>";
            }
            
        else {
            echo "0 results";
        }
            


if (isset($_GET['category_id'])){
    $category_id = intval($_GET['category_id']);

    $delete = mysqli_query($conn,"DELETE FROM category WHERE category_id = '$category_id'");

      if ($delete) {
        //echo '<script>alert("Record deleted successfully!");</script>';
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Record deleted successfully! "); 
        window.location.href = "category.php";</script>';
        echo "</strong>";
      } else {
        //$msg = "Error: Unable to delete data due to foreign key constraints" ;//. $delete .  mysqli_error($conn);
        //echo '<script>alert("'. $msg .'");</script>';
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to delete data due to foreign key constraints "); 
        window.location.href = "category.php";
    </script>';
    echo "</strong>";
      }
   }
   mysqli_close($conn);
  
?>          

</body>
</html>