<?php
	include 'conn.php';
            
    $sql = " SELECT * FROM raaha"; 	            
	$result = mysqli_query($conn,$sql);

	$catagory  = array();

                    if ($result->num_rows > 0) {
	                   while ($row = $result->fetch_assoc()) {
			                 
			                 $cat = $row['catagory'];
			                 
			                 if (!in_array($cat, $catagory))
							  {
				                 array_push($catagory, $cat);
 							  }


			                 }
			               }	


?>
<!DOCTYPE html>
<html>
<head>
	<title>Rahha</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/style.css">



</head>
<body>
	<div class="mynav">
		<nav class="navbar navbar-default">
		  <div class="container-fluid col-md-12 col-lg-12 ">
		    <div class="navbar-header col-md-2 col-lg-2">
		      <a class="navbar-brand" href="#">RAHHA</a>
		    </div>

		    <div class="col-md-2 col-lg-2"></div>
		    <ul class="nav navbar-nav navbar col-md-6 col-lg-6 ">
		      <li class="active"><a href="#">Home</a></li>
		      <li><a href="#">Page 1</a></li>
		      <li><a href="#">Page 2</a></li><li><a href="#">Page 1</a></li>
		      <li><a href="#">Page 2</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right col-md-2 col-lg-2">
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
		  </div>
		</nav>
	</div>
<div class="container-fluid options">

		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<h1 class="text-center">CAREER OPTIONS</h1>
		</div>

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 myoptions">
		
<?php            
    
for ($i=0; $i < sizeof($catagory) ; $i++) { 
?>

		<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" style="float: left;">
		
			<h3><b><?php echo $catagory[$i]; ?></b></h3>
				<ul>

<?php					
			
            $sql = " SELECT * FROM raaha WHERE catagory = '$catagory[$i]' "; 	            
			$result = mysqli_query($conn,$sql);

			if ($result->num_rows > 0) {
	            while ($row = $result->fetch_assoc()) {
			    
			         $field = $row['field'];
    
?>
				
			<a href="option.php?field=<?php echo $field; ?>"><li><?php echo $field; ?></li></a>

<?php  
					} 
			}

?>
				</ul>

			</div>

<?php 
}

 ?>

</div>	


			
		
</div>


<?php
mysqli_close($conn);
?>
</body>
</html>