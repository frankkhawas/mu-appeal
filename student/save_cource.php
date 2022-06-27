<?php 
	include('student_session.php');

	if(isset($_POST['save_cource'])) {
		$fmarks = mysqli_real_escape_string($conn, $_POST['fmarks']);
		$appeal_id = mysqli_real_escape_string($conn, $_POST['appeal_id']);
		$course = mysqli_real_escape_string($conn, $_POST['course']);
		
		$check_appeal = mysqli_query($conn, "SELECT ac_id FROM tbl_appeal_course WHERE appeal = $appeal_id");
		$count_appeal = mysqli_num_rows($check_appeal);

		if($count_appeal < 4) {
			if(empty($appeal_id) || empty($fmarks) || empty($course)) {
				header("location:index.php?error=all field are required");
			}

			else {
				$save_course_sql = "INSERT INTO tbl_appeal_course(course , appeal , fe_marks) 
				VALUES('$course', '$appeal_id', '$fmarks')";
				$excute_sql = mysqli_query($conn, $save_course_sql);

				if($excute_sql) {
					header("location:index.php?success=Course Saved Successfully");
				}
				else {
					$error =  mysqli_error($conn);
					header("location:index.php?error=$error");
					echo "error $course";
				}
			}
		}
		else {
			header("location:index.php?error=Maximum course to appeal is four only");
		}
	}
	else {
		echo "bad access";
	}
?>