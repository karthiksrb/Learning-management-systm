<!DOCTYPE html>
  <html>
  <head>
		<link rel="stylesheet" href="style3.css">
  </head>

	<body>

	<?php include 'dbconnect.php'; ?>

	<?php
	//$NO = $_GET['no'];
//$sql ="SELECT * FROM syllabus WHERE scode='$NO'";




// Execute insert query
//$result = mysqli_query($conn, $sql);

//while (($row = mysqli_fetch_assoc($result))) {
	 ?>
		<div class="h1">
		<div style="text-align:center">
			<h1>What you want to upload ? </h1>
			
		</div>
		</div>

		<div class="colum">
			<div class="row">
			   <div class="card"><a href="adminsyll.php"> SYLLABUS</a></div>
			   <!--<a href="Submit.html">SEM 1</a>-->
			</div>
			<div class="row">
			   <div class="card"><a href="adminnotes.php"> NOTES</a></div>
			</div>
			<div class="row">
			  <div class="card"><a href="adminqp.php">QUESTION PAPERS</div>
			</div>
			<?php
						?>
	</body>