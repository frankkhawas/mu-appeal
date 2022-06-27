<?php include('student_session.php')?>
<?php 
	//check if auth student have alread have unapresseced appeal
	$limit_appeal_queary = mysqli_query($conn, "SELECT * FROM tblappeal WHERE tblappeal.is_current = 1 AND tblappeal.student = $student_id");
	$count_limit = mysqli_num_rows($limit_appeal_queary);

	$list_of_cource = mysqli_query($conn, "SELECT * FROM `tblcourse`");

	//query bfor appeal
	$appeal_list = mysqli_query($conn, "SELECT * FROM `tblappeal` WHERE tblappeal.student = $student_id AND is_current = 1 ");
	$appeal_item = mysqli_fetch_array($appeal_list);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student-Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		a {
			color: white;
			font-weight: 700;
		}
		a:hover {
			color: white;
			font-weight: 700;
		}
		.bg-mzumbe {
			background-color: #123;
		}
	</style>
</head>
<body>
	<div class="bg-mzumbe">
		<div class="d-flex p-3 justify-content-between">
			<div>
				<a href="">Home</a>
				<a href="" class="ml-3">Appeal History</a>
			</div>
			<div>
				<h6 class="text-white">Welcome <?php echo $username ?></h6>
			</div>
		</div>
	</div>
	<div class="container mt-3">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php if(isset($_GET['error'])) { ?>
	          		<div class="alert alert-danger alert-dismissible fade show">
	          			<a href="index.php" class="close">&times;</a>
	          			<strong>Error!</strong><?php echo $_GET['error'] ?>
	          		</div>
	          	<?php } ?>
	          	<?php if(isset($_GET['success'])) { ?>
          			<div class="alert alert-success alert-dismissible fade show">
          				<a href="index.php"  class="close">&times;</a>
          				<strong>Success!</strong><?php echo $_GET['success'] ?>
          			</div>
          		<?php } ?>
          		<?php if($count_limit == 0) { ?>
					<div class="card card-body">
						<h4 class="text-center text-muted">Request New Appeal</h4>
						<hr>
						<form action="save_appeal.php" method="POST">
							<div class="form-group">
								<input type="number" name="receipt" placeholder="Receipt Number" class="form-control" required>
							</div>
							<div class="form-group">
								<select required name="semister" class="form-control">
									<option value="">---select semister--</option>
									<option value="semister 1">Semister 1</option>
									<option value="semister 2">Semister 2</option>
								</select>
							</div>
							<div class="form-group">
							   <button type="submit" name="request_appeal" class="text-white btn btn-color btn-block" style="background-color:#fd876d">Request Appeal
	              				</button>
							</div>
						</form>
					</div>
				<?php } else { ?>
					<div class="row">
						<div class="col-md-12 card card-body">
							<div class="d-flex justify-content-between mb-3">
								<h4 class="text-center">Current Appeal</h4>
								<button class="btn btn-success" data-target="#addSubject" data-toggle="modal">Add Subject</button>
							</div>
							
							<table class="table table-striped table-border">
								<tr>
									<th>receipt_number </th>
									<th>semister</th>
									<th>appeal_date</th>
								</tr>
								<tr>
									<td><?php echo $appeal_item['receipt_number'] ?></td>
									<td><?php echo $appeal_item['semister'] ?></td>
									<td><?php echo $appeal_item['appeal_date'] ?></td>
								</tr>
							</table>
							<hr>
							<h5>Course</h5>	
							<?php 
								$appeal_id = $appeal_item['appeal_id']; 
								$appeal_course = mysqli_query($conn, "SELECT tblcourse.course_code, tblcourse.course_name,
									tbl_appeal_course.fe_marks FROM tbl_appeal_course, tblcourse
									WHERE tbl_appeal_course.course = tblcourse.course_id
									AND tbl_appeal_course.appeal = $appeal_id ");
							?>
							<table>
								<thead class="bg-mzumbe text-white">
									<tr>
										<th>Course Code</th>
										<th>Couser Name</th>
										<th>Final Marks</th>
									</tr>
								</thead>
								<?php while($appeal_course_item = mysqli_fetch_array($appeal_course)) { ?>
									<tr>
										<td><?php echo $appeal_course_item['course_code'] ?></td>
										<td><?php echo $appeal_course_item['course_name'] ?></td>
										<td><?php echo $appeal_course_item['fe_marks'] ?></td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>

					<!-- modal for adding subject -->
					<div class="modal fade" id="addSubject">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-mzumbe ">
									<h5 class="text-white">Add Subject</h5>
								</div>
								<form action="save_cource.php" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<input type="number" name="fmarks" placeholder="Final Marks" class="form-control" required>
										</div>
										<div class="form-group">
											<input hidden type="number" name="appeal_id" value="<?php echo $appeal_item['appeal_id'] ?>" class="form-control" required>
										</div>
										<div class="form-group">
											<select required name="course" class="form-control">
												<option value="">---select Cource--</option>
												<?php while($course_item = mysqli_fetch_array($list_of_cource)){ ?>
													<option value="<?php echo $course_item['course_id'] ?>">
														<?php echo $course_item['course_name'] ?> 
														(<?php echo $course_item['course_code'] ?>)
													</option>
												<?php } ?>
											</select>
										</div>
										
									</div>
									<div class="modal-footer">
										<div class="form-group">
										   <button type="submit" name="save_cource" 
										   		class="text-white btn btn-color btn-block" style="background-color:#fd876d">Save Course
				              				</button>
										</div>
									</div>	
								</form>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>