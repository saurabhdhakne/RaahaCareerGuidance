<?php 

include 'conn.php';

 if (!$conn){     
 			die("Connection failed: " . mysqli_connect_error()); 
			}


$id = $_GET['id'];

 $sql = "DELETE FROM raaha  WHERE id ='$id' ";


if (mysqli_query($conn,$sql))
 { 
 	?>

<h1>DATA DELETED SUCCESSFULLY</h1>

 	<?php
	header( "refresh:2;update_raaha.php" );
  }
else 
   {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 

mysqli_close($conn);
?>