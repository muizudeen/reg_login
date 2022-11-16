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
 					<div class="panel-heading">Student List</div>
 					<table class="table table bordered">
 						<?php
 						  $id = $_GET['s_id'];
					      $sql = "SELECT * FROM employees WHERE e_id='$id'";
					      $result = mysqli_query($connect, $sql);
					        if (mysqli_num_rows($result) > 0) {
					          while ($employee = mysqli_fetch_assoc($result)) { ?>
					          	<tr>
								  	<th style="width: 130px;">Name</th>
								  	<td><?php echo $employee['e_name']; ?></td>
								  </tr>
								  <tr>
								  	<th>Email</th>
								  	<td><?php echo $employee['e_email']; ?></td>
								  </tr>
								  <tr>
								  	<th>Phone</th>
								  	<td><?php echo $employee['e_phone']; ?></td>
								</tr>
								<tr>
									<td>
										<a href="single_student_edit.php?s_id=<?php echo $employee['e_id']; ?>" class="btn btn-sm btn-warning">Edit</a>
										<a href="delete_student.php?s_id=<?php echo $employee['e_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
									</td>
								</tr>
					        <?php  }
					        }else {
					          echo "0 results";
					        }
					  ?>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>


 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>