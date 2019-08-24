<?php
include 'conn.php';
	
$field = $_GET['field'];
$tag = $_GET['tag'];
$cat = $_GET['cat'];

$feild1=str_replace(" ", "2", $field);

if(!is_null($field) && !is_null($tag))
{

	$sql1 = "select * from raaha ";
	$res=mysqli_query($conn,$sql1);
	
	if($res->num_rows>0)
	while ($row = $res->fetch_assoc()) {
			if ($field == $row["field"]) {
				
		die("Data Already present");	
			}
		}

	$sql = "INSERT INTO raaha(`field`,`tag`,`catagory`) VALUES ('$field','$tag','$cat')";


	if (mysqli_query($conn,$sql))
	 {    
    
 	echo "Field and Tag Inserted Successfully";
  
  	}

	else 
   {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }




    $sql = "CREATE TABLE $feild1(id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                        question VARCHAR(1000) ,
                                                        answer VARCHAR(10000))";
                                                                      
                                  $result = mysqli_query($conn,$sql);

                                     if ($conn->query($sql) === TRUE) {  
                                        echo "Table CREATED successfully";
                                       
                                        } 
                                    else {     
                                        echo "Error creating table: " . $conn->error; 
                                      }  


header( "refresh:3;insert.php" );
  

mysqli_close($conn);
}

?>

