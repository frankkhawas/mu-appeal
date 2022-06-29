<?php 
	session_start();
	include('config/conn.php');

	if(isset($_POST['login'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$hash_password = sha1($password);

		$query = mysqli_query($conn, "SELECT * FROM tbluser
			WHERE username='$username'
			AND password = '$hash_password'");
		$count_user = mysqli_num_rows($query);

		if($count_user == 1) {
			$userdata = mysqli_fetch_array($query);
			$_SESSION['auth'] = true;
			$_SESSION['username'] = $userdata['username'];
			$_SESSION['user_id'] = $userdata['user_id'];
			$_SESSION['type'] = $userdata['type'];

			if($_SESSION['type'] == 'student') {
				$_SESSION['is_student'] = true;
				header("location:student/");
			}
			elseif($_SESSION['type'] == 'hod' || $_SESSION['type'] == 'dean' || $_SESSION['type'] == 'senate') {
				$_SESSION['is_staff'] = true;
				header("location:staff/");
			}
		}

		else {
			// header("location:index.php?error=invalid username or password");
			echo "erro";
		}
	}
?>