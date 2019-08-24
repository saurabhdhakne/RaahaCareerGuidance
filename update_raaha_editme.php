<?php 

include 'conn.php';

 if (!$conn){     
 			die("Connection failed: " . mysqli_connect_error()); 
			}

$field2 = $_GET['field2'];
$question = $_GET['question'];
$answer = $_GET['answer'];
$id = $_GET['id'];

 $sql = "UPDATE $field2 SET question ='$question',answer ='$answer' WHERE id ='$id' ";


if (mysqli_query($conn,$sql))
 { 
 	?>

<h1 class="jumbotron">DATA UPDATED SUCCESSFULLY</h1>

 	<?php
	header( "refresh:2;update_raaha.php" );
  }
else 
   {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 

mysqli_close($conn);
?>