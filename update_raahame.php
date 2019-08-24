<?php 

include 'conn.php';

 if (!$conn){     
 			die("Connection failed: " . mysqli_connect_error()); 
			}


$id = $_GET['id'];
$tag = $_GET['tag'];
$catagory = $_GET['catagory'];

 $sql = "UPDATE raaha set tag ='$tag',catagory ='$catagory' WHERE id ='$id' ";


if (mysqli_query($conn,$sql))
 { 
 	?>

<h1>DATA UPDATED SUCCESSFULLY</h1>

 	<?php
	header( "refresh:2;update_raaha.php" );
  }
else 
   {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 

mysqli_close($conn);
?>