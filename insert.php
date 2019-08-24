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
<html>
<head>
	<title></title>

		<title>Raaha</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
body{
	margin: 0;
	padding:0;
	background: -webkit-linear-gradient(-45deg,#ec6ead,#3494ea);
	font-size: 2em;
}	

.jumbotron{
	padding: 30px;
}
</style>

</head>
<body>
<div class="container">
<h1 class="text-center jumbotron">Insert Data - Main Table<br>
      <a href="logout.php"><span class="glyphicon glyphicon-log-out	"></span> Logout  </a>
  </h1>


<form action="insertFeild.php" method="GET">
	
	 <div class="form-group">
	    <label for="field"> Field :</label>
	    <input type="text" class="form-control" id="field" name="field">
	 </div>
	
	 <div class="form-group">
	    <label for="tag"> Tag :</label>
	    <input type="text" class="form-control" id="tag" name="tag">
	 </div>

	 <div class="form-group">
	    <label for="cat"> Categary :</label>
	    <input type="text" class="form-control" id="cat" name="cat">
	 </div>

<input type="submit" name="sub"  class="btn btn-primary">

<h4>Special Character is not Allowed and don't give space befor the data your going to enter.</h4> 

</form>


<h1 class="text-center jumbotron">Insert Data - Sub Tables</h1>
<form action="insertFeild2.php" method="GET">

	 <div class="form-group">
	    <label for="question"> Question :</label>
	    <input type="text" class="form-control" id="question" name="question">
	 </div>

	 <div class="form-group">
	    <label for="answer"> Answer:</label>
	    <input type="text" class="form-control" id="answer" name="answer">
	 </div>


	<select name="field">
		<?php 

			include 'check_con.php';
            
            $sql = " SELECT * FROM raaha"; 	            
			$result = mysqli_query($conn,$sql);

                    if ($result->num_rows > 0) {
	                   while ($row = $result->fetch_assoc()) {
			                 $cat = $row['field'];
		
		?>

	<option value="<?php echo $cat; ?>"> <?php echo $cat; ?></option>
		
		<?php
						}
					}


mysqli_close($conn);
		  ?>
	</select>

<input type="submit" name="sub" class="btn btn-primary">

</form>

</div>

</body>
</html>