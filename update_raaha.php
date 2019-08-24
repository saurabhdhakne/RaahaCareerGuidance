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

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
	<h1 class="container jumbotron text-center">Edit Information (Raaha Table)<br>
	 <a href="logout.php"><span class="glyphicon glyphicon-log-out	"></span> Logout  </a>
  </h1>
<div class="container-fluid">
	<table class="table thead-dark">
    <thead>
      <tr>
        <th>Field </th>
        <th>Tag</th>
        <th>Catagory</th>
        <th>Submit</th>        
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>


<?php
include 'conn.php';

	
	$sql = "select * from raaha";
	$res = mysqli_query($conn,$sql);
	
	if($res->num_rows>0){
	while ($row = $res->fetch_assoc()) {
		 $id = $row['id'];
		 $field = $row['field'] ;
		 $tag = $row['tag'];
		 $catagory = $row['catagory'];

?>


<form method="GET" action="update_raahame.php">

      <tr>

        <td>
        	<div class="form-group">
				  <?php echo $field ; ?><input type="hidden" value="<?php echo $id ; ?>" name="id">
			</div>
        </td>
        <td>
        	<div class="form-group">
				  <input type="text" class="form-control"  value="<?php echo $tag ; ?>" name="tag" >
			</div>	 
        </td>
        <td>
        	<div class="form-group">
				  <input type="text" class="form-control"  value="<?php echo $catagory ; ?>" name="catagory" >
			</div>	 
        </td>
        <td>
        	<div class="form-group">
				<input type="submit" class="btn btn-primary" name="sub" value="Submit" >	  
			</div>	 
        </td>
        
        <td>
        	<div class="form-group">
				<a href="update_raaha_delete.php?id=<?php echo $id; ?>">
				<input type="button" class="btn btn-danger" name="" value="Delete">	  
				</a>
			</div>	 
        </td>

        <td>
        	<div class="form-group">
        		<a href="update_raaha_edit.php?field=<?php echo $field; ?>">
				<input type="button" class="btn btn-success" name="" value="Edit">	  
				</a>
			</div>	 
        </td>
        
</form>
      </tr>

<?php 
}
}
?>

     </tbody>
  </table>

</div>

</body>
</html>
