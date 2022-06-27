<?php 
	include('student_session.php');

	if(isset($_POST['request_appeal'])) {
		$receipt = mysqli_real_escape_string($conn, $_POST['receipt']);
		$semister = mysqli_real_escape_string($conn, $_POST['semister']);

		if(empty($semister) || empty($receipt)) {
			header("location:index.php?error=all field are required");
		}

		else {
			$save_appeal_sql = "INSERT INTO tblappeal(receipt_number, semister, student) 
			VALUES('$receipt', '$semister', '$student_id')";
			$excute_sql = mysqli_query($conn, $save_appeal_sql);

			if($excute_sql) {
				header("location:index.php?success=Appeal Saved Successfully");
			}
			else {
				header("location:index.php?error=something went wrong try again");
			}
		}
	}
	else {
		echo "bad access";
	}
?>