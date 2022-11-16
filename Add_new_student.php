<?php 
	require 'connect.php';
	session_start();
		if (!$_SESSION['u_name']) {
			header('location: index.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<!-- cdn boostrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">	

	<!-- Latest compiled and minified JavaScript -->
	
</head>
<body>
 	<!-- nav start -->
 	<?php 
 		require 'nav.php';
 	?>
 	<!-- nav end -->

 	<!-- main content -->
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-3 col-md-3">
 				<div class="panel panel-default">
 					<div class="panel-heading">Students</div>
 					<ul class="list-group">
 						<li class="list-group-item"><a href="Add_new_student.php">Add Student</a></li>
 						<li class="list-group-item"><a href="dashboard.php">View All Students</a></li>
 					</ul>
 				</div>
 			</div>
 			<div class="col-lg-9 col-md-9">
 				<div class="panel panel-default">
 					<div class="panel-heading">Add Student</div>
 					<div class="panel-body">
 						<form action="" method="POST">
 							<div class="form-group">
 								<input type="text" class="form-control input-sm" name="name" placeholder="Enter Student Name" required>
 							</div>
 							<div class="form-group">
 								<input type="email" class="form-control input-sm" name="email" placeholder="Enter Student Email" required>
 							</div>
 							<div class="form-group">
 								<input type="text" class="form-control input-sm" name="phone" placeholder="Enter Student Phone Number" required>
 							</div>
 							<div>
 								<input type="submit" class="btn btn-sm btn-success" name="add" value="Add Student">
 							</div>
 							
 						</form>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- main content -->
 	<?php
 		if (isset($_POST['add'])) {
 		 	$s_name = $_POST['name'];
 		 	$s_email = $_POST['email'];
 		 	$s_phone = $_POST['phone'];

 		 	$sql = "INSERT INTO employees (e_name, e_email, e_phone) VALUES('$s_name', '$s_email', '$s_phone') ";
 		 		if (mysqli_query($connect, $sql)) {
 		 			echo "<script>alert('Student Added Successfully');</script>";
 		 		} else {
 		 			echo "Error: ". $sql. "<br>" . mysqli_error($connect);
 		 		}
 		 } 
 	?>

 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>