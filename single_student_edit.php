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
 						  <?php
 						  $id = $_GET['s_id'];
					      $sql = "SELECT * FROM employees WHERE e_id='$id'";
					      $result = mysqli_query($connect, $sql);
					        if (mysqli_num_rows($result) > 0) {
					          while ($employee = mysqli_fetch_assoc($result)) { ?>
 							<div class="form-group">
 								<input type="text" class="form-control input-sm" name="name" placeholder="Enter Student Name" value="<?php echo $employee['e_name']; ?>" required>
 							</div>
 							<div class="form-group">
 								<input type="email" class="form-control input-sm" name="email" placeholder="Enter Student Email" value="<?php echo $employee['e_email']; ?>" required>
 							</div>
 							<div class="form-group">
 								<input type="text" class="form-control input-sm" name="phone" placeholder="Enter Student Phone Number" value="<?php echo $employee['e_phone']; ?>" required>
 							</div>
 							<div>
 								<input type="submit" class="btn btn-sm btn-success" name="update" value="Update Student">
 							</div>
 							  <?php  }
					        }else {
					          echo "0 results";
					        }
					  ?>
 						</form>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- main content -->
 	<?php
 		if (isset($_POST['update'])) {
 		 	$s_name = $_POST['name'];
 		 	$s_email = $_POST['email'];
 		 	$s_phone = $_POST['phone'];

 		 	$sql = "UPDATE employees SET e_name='$s_name', e_email='$s_email', e_phone='$s_phone' WHERE e_id='$id'";
 		 		if (mysqli_query($connect, $sql)) {
 		 			header('location: dashboard.php');
 		 		} else {
 		 			echo "Error Updating Record " . mysqli_error($connect);
 		 		}
 		 } 
 	?>

 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>