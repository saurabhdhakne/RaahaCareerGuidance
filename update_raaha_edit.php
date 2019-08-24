<?php
include 'conn.php';
session_start();

if(isset($_SESSION['username']))
{
   $user=$_SESSION['username'];

              $sql="select * from admin";

              $result=mysqli_query($conn,$sql);

              if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $uname = $row['username'];
                    
                  if ($uname != $user) {
                 
                                header('location:admin_login.php');
                    
                  }
              }
              }


}
else{

    header('location:myadmin.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Raaha</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
</head>
<body>

<div class="container">
	<h1 class="jumbotron text-center">Edit Information<br>
	 <a href="logout.php"><span class="glyphicon glyphicon-log-out	"></span> Logout  </a>
  </h1>

		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

<table class="table thead-dark">
    <thead>
      <tr>
        <th>Question </th>
        <th>Answer</th>
        <th>Submit</th>        
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

<?php

include 'conn.php';


	$field = $_GET['field'];
	$field2=str_replace(" ", "2", $field);

	$sql = "SELECT * FROM $field2 ";
	$res = mysqli_query($conn,$sql);
	
	if($res->num_rows>0){
	while ($row = $res->fetch_assoc()) {
		 $id = $row['id'];
		 $question = $row['question'] ;
		 $answer = $row['answer'];

?>

			
<form method="GET" action="update_raaha_editme.php">

      <tr>

        <td>
        	<div class="form-group">
				  <input type="hidden" value="<?php echo $field2 ; ?>" name="field2">
				  <input type="hidden" value="<?php echo $id; ?>" name="id">
				  <input type="text" class="form-control"  value="<?php echo $question ; ?>" name="question" >
			</div>	 
        </td>
        <td>
        	<div class="form-group">
				  <input type="text" class="form-control"  value="<?php echo $answer ; ?>" name="answer" >
			</div>	 
        </td>
        <td>
        	<div class="form-group">
				<input type="submit" class="btn btn-primary" name="sub" value="Submit" >	  
			</div>	 
        </td>
        
        <td>
        	<div class="form-group">
        		<input type="submit" class="btn btn-danger"  name="" value="Delete">	  
			</div>	 
        </td>

       </tr>
<?php

?>
       </form> 

<?php 
			}
		}
?>

</tbody>
</table>

		</div>

</div>

</body>
</html>