<?php
include 'conn.php';
	
$question = $_GET['question'];
$answer = $_GET['answer'];
$field = $_GET['field'];

$field2=str_replace(" ", "2", $field);

if(!is_null($question) && !is_null($answer) )
{

	
	$sql1 = "select * from $field2";
	$res=mysqli_query($conn,$sql1);
	
	if($res->num_rows>0)
	while ($row = $res->fetch_assoc()) {
			if ($question == $row["question"]) {
				
		die("Data Already present");	
			}
		}

	$sql = "INSERT INTO $field2(`question`,`answer`) VALUES ('$question','$answer')";


	if (mysqli_query($conn,$sql))
	 {    
    
 	echo "Field and Tag Inserted Successfully";
  
  	}

	else 
   {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }


}

header( "refresh:2;insert.php" );
  
mysqli_close($conn);

?>

