<!DOCTYPE html>
<html>
<head>
	<title>Raaha</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/style.css">


<style type="text/css">
	.jumbotron{
		padding:30px; 
	}
</style>
</head>
<body>
	<div class="mynav">
		<nav class="navbar navbar-default">
		  <div class="container-fluid col-md-12 col-lg-12 ">
		    <div class="navbar-header col-md-2 col-lg-2">
		      <a class="navbar-brand" href="#">RAAHA</a>
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
<div class="container option-div">

		<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
<?php 			include 'conn.php';
            
            $myfield = $_GET['field'];
            
			$field2=str_replace(" ", "2", $myfield);

	        $sql = " SELECT * FROM raaha WHERE field = '$myfield' " ; 	            
			$result = mysqli_query($conn,$sql);

                    if ($result->num_rows > 0) {
	                   while ($row = $result->fetch_assoc()) {
			                 $tag = $row['tag'];

?>

	
			<h1 class="jumbotron"><?php echo $myfield; ?></h1>
			<p class="jumbotron"><?php echo $tag; ?></p>
			<hr>

<?php
	        }}

	        $sql = " SELECT * FROM $field2 " ; 	            
			$result = mysqli_query($conn,$sql);

                    if ($result->num_rows > 0) {
	                   while ($row = $result->fetch_assoc()) {
			                 $question = $row['question'];
			                 $answer = $row['answer'];

?>
			<h3 class=""><u>Question</u> : <?php echo $question; ?></h3><br>
			<p> <u>Answer</u> : <?php echo $answer; ?></p>
			<hr>


<?php
}
				}		
?>

		</div>
</div>
<div class="container-fluid footer ">
	<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
		<h2>About</h2>
		<p>this is about info.</p>
	</div>

	<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
		<h2>Career Opportunities</h2>
		<p>this is Career Opportunities</p>
	</div>

	<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
		<h2>Contact Us</h2>
		<p>Name : +100<br>
			Name : +100<br>
		</p>
	</div>

	<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
		<h2>Let's be friends</h2>
		<p>
		<a href="#"><li><span class="fa fa-instagram"></span> Instagram</li></a>
	<a href="#"><li><span class="fa fa-facebook-official"></span> Facebook</li></a>
	<a href="#" ><li><span class="fa fa-envelope"></span> Email</li> </a>
	<a href="#"><li><span class="fa fa-whatsapp"></span> Whatsapp</li></a>


		</p>
	</div>
	
</div>

</body>
</html>