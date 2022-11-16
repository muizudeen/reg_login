<?php 
	require 'connect.php';
	 $id = $_GET['s_id'];
	 $sql = "DELETE FROM employees WHERE e_id='$id'";
	 	if (mysqli_query($connect, $sql)) {
	 		header('location: dashboard.php');
	 	}else {
	 		echo "Error Deleting Student Record" . mysqli_error($connect);
	 	}
?>