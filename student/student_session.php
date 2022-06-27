<?php  
session_start();
include('../config/conn.php');
if(!isset($_SESSION['auth']) && !isset($_SESSION['is_student'])) {
	header("location:../logout.php");
}

else {
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];

	//fecth student with authenticated user or by using user id
	$get_student = mysqli_query($conn, "SELECT student_id  FROM tblstudent WHERE user = $user_id");
	$fetch_student = mysqli_fetch_array($get_student);
	$student_id = $fetch_student['student_id'];
}


?>