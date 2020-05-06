<html>

<head>
  <title>Film</title> 
</head>

<body>
<h1><img src="pokeball.jpg" width = "60" height = "60" style="vertical-align:bottom"> FILM <img src="pikachu.gif" width = "110" height = "80" style="vertical-align:bottom"></h1>

<form method="post" action="">

<?php
    $field = array("film_id","title", "description", "release_year", "language_id", "original_language_id","rental_duration", "rental_rate", "length", "replacement_cost", "rating", "special_features", "last_update");

     if(!empty($_POST['field'])) {
            $field = $_POST['field'];
    }
?>

<h2>Select at least 1 field to display:</h2>

<h3>
    <p class="a">
    <label><input type="checkbox"  name='field[]'  value="film_id" <?php echo (in_array('film_id',$field)) ?'checked':'' ?> > Film Id</label>
    <label><input type="checkbox"  name='field[]' value="title" <?php echo (in_array('title',$field)) ?'checked':'' ?> > Title</label>
    <label><input type="checkbox"  name='field[]' value="description" <?php echo (in_array('description',$field)) ?'checked':'' ?> > Description</label>
    <label><input type="checkbox"  name='field[]' value="release_year" <?php echo (in_array('release_year',$field)) ?'checked':'' ?> > Release Year</label>
    <label><input type="checkbox"  name='field[]' value="language_id" <?php echo (in_array('language_id',$field)) ?'checked':'' ?> > Language Id</label>
    <label><input type="checkbox"  name='field[]' value="original_language_id" <?php echo (in_array('original_language_id',$field)) ?'checked':'' ?> > Original Language Id</label>
    <label><input type="checkbox"  name='field[]' value="rental_duration" <?php echo (in_array('rental_duration',$field)) ?'checked':'' ?> > Rental Duration</label>
    <label><input type="checkbox"  name='field[]' value="rental_rate" <?php echo (in_array('rental_rate',$field)) ?'checked':'' ?> > Rental Rate</label>
    <label><input type="checkbox"  name='field[]' value="length" <?php echo (in_array('length',$field)) ?'checked':'' ?> > Length</label>
    <label><input type="checkbox"  name='field[]' value="replacement_cost" <?php echo (in_array('replacement_cost',$field)) ?'checked':'' ?> > Replacement Cost</label>
    <label><input type="checkbox"  name='field[]' value="rating" <?php echo (in_array('rating',$field)) ?'checked':'' ?> > Rating</label>
    <label><input type="checkbox"  name='field[]' value="special_features" <?php echo (in_array('special_features',$field)) ?'checked':'' ?> > Special Features</label>
    <label><input type="checkbox"  name='field[]' value="last_update" <?php echo (in_array('last_update',$field)) ?'checked':'' ?> > Last Update</label>
    </p>    
</h3>

    <input type="submit" value="Select" name="submit"></input></form>
    <button class ="button1" onclick = "location.href='insert_film.php'">Insert</button>

<?php	
			include 'table.css';
			include 'back.php';    
            include_once 'connect.php'; 
      		$sql = "SELECT * FROM film";
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
                      echo '<td><a href="update_film.php"><button>Update</button></a>  <a href="film.php?film_id=' .$row["film_id"].'"><button>Delete</button></a> </td>';
                  }  
                  echo "</tr>";           
                }
               
                echo"</table>";
            }
            
            else {
                echo "0 results";
            }
            
if (isset($_GET['film_id'])){
    $film_id = intval($_GET['film_id']);
    
    $delete = mysqli_query($conn,"DELETE FROM film WHERE film_id = '$film_id'");

      if ($delete) {
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Record deleted successfully! "); 
        window.location.href = "film.php";
    </script>'; 
    echo "</strong>";
      } 
      
      else { 
        echo "<strong>";
        echo '<script type="text/javascript"> 
        alert("Error: Unable to delete data due to foreign key constraints "); 
        window.location.href = "film.php";
        </script>';
        echo "</strong>";
      }
   }
   mysqli_close($conn);
  
?>

</body>
</html>