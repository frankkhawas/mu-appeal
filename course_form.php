<?php 
 $conn = mysqli_connect("127.0.0.1", "root", "", "mu_appeal");
	if(isset($_POST['submit'])) {
		$course_code = mysqli_real_escape_string($conn, $_POST['course_code']);
		$course_name = mysqli_real_escape_string($conn, $_POST['course_name']);

		if(empty($course_code) || empty($course_name)) {
			header("location:course_form.php?error=all field are required");
		}

		else {
			$sql = "INSERT INTO tblcourse(course_code, course_name) 
			VALUES('$course_code', '$course_name')";
			$excute_sql = mysqli_query($conn, $sql);

			if($excute_sql) {
				header("location:course_form.php?success=course Saved Successfully");
			}
			else {
				header("location:course_form.php?error=something went wrong try again");
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-body my-5"style="height:90% ;">
        <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <a href="course_form.php" class="close">&times;</a>
                    <strong>Error!</strong><?php echo $_GET['error'] ?>
                </div>
                <?php } ?>
                <?php if(isset($_GET['success'])) { ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="course_form.php" class="close">&times;</a>
                    <strong>Success!</strong><?php echo $_GET['success'] ?>
                </div>
                <?php } ?>
            <h4 class="text-center text-muted">Course Form</h4>
            <hr>
            <form action="course_form.php" method="POST">
              <div class="form-group">
                <input type="text" placeholder="Enter course code" required name="course_code" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Enter course name" required name="course_name" class="form-control">
             
              </div>
              <div class="form-group">
                 <button type="submit" name="submit" class="text-white btn btn-color btn-block" style="background-color:#fd876d">submit form
                        </button>
              </div>
            </form>
          </div>

</body>
</html>
  
</body>
</html>