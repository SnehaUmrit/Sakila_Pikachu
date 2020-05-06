<html>

<head>
  <title>Film Actor</title> 
</head>

<body>
<h1><img src="pokeball.jpg" width = "60" height = "60" style="vertical-align:bottom"> FILM ACTOR <img src="pikachu.gif" width = "110" height = "80" style="vertical-align:bottom"></h1>
<button onclick = "location.href='insert_filmactor.php'">Insert</button>

<form method="post" action="">

<?php	
      $field = array("actor_id","film_id", "last_update");

      if(!empty($_POST['field'])) {
        $field = $_POST['field'];
      }
?>

<h2>Select at least 1 field to display:</h2>

<h3>
    <p class="a">
    <label><input type="checkbox" name="field[]" value="actor_id" <?php echo (in_array('actor_id',$field)) ?'checked':'' ?> > Actor Id</input></label>
    <label><input type="checkbox" name="field[]" value="film_id" <?php echo (in_array('film_id',$field)) ?'checked':'' ?> > Film Id</input></label>
    <label><input type="checkbox" name="field[]" value="last_update" <?php echo (in_array('last_update',$field)) ?'checked':'' ?> > Last Update</input></label>
    </p>
</h3>

      <input type="submit" value="Select" name="submit"></input></form>
      <button onclick = "location.href='insert_filmactor.php'">Insert</button>
  
<?php
			include 'table.css';
			include 'back.php';    
			include_once 'connect.php';
  			$sql = "SELECT * FROM film_actor";
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
                    
                    echo '<td><a href="update_filmactor.php"><button>Update</button></a>  <a href="film_actor.php?actor_id=' .$row["actor_id"]. '"><button>Delete</button></a> </td>';

                    }
                    echo "</tr>";
                    
                }
                
                echo"</table>";
            }
            
        else {
            echo "0 results";
        }
        

if (isset($_GET['actor_id'])){
    $actor_id = intval($_GET['actor_id']);

    $delete = mysqli_query($conn,"DELETE FROM film_actor WHERE actor_id = '$actor_id'");

      if ($delete) {
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Record deleted successfully! "); 
        window.location.href = "film_actor.php";
    </script>';
    echo "</strong>";
        
      } else {
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to delete data due to foreign key constraints "); 
        window.location.href = "film_actor.php";
    </script>';
    echo "</strong>";
      }
   }
   mysqli_close($conn);
  
?>          

</body>
</html>