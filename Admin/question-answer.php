<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php  
	if (isset($_POST['sub'])) {
		$year=$_POST['year'];
		$qaupload=$_FILES['qaupload']['name'];
		$tmp_qaupload=$_FILES['qaupload']['tmp_name'];
		$folder = 'QuestionAndAnswerFile/';
		$course_code=$_POST['course_code'];
		move_uploaded_file($tmp_qaupload, $folder.$qaupload);
		// $course_code=$_POST['course_code'];
		// $credit_hours=$_POST['credit_hours'];

		$query="insert into question_answer_files(file_name,year,course_code)values('$qaupload','$year','$course_code')";
		$run=mysqli_query($con,$query);
		if ($run) {
			echo '<script>alert("Your Data has been successfully inserted.")</script>';
			// echo "successfully";
		}
		else{
			echo '<script>alert("Your Data has not been inserted.")</script>';
			// echo "not";
		}
	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Question Answer</title>
		<link rel="shortcut icon" href="../Images/logo-DIT.png" type="image/x-icon">
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Question Answer Management </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="question-answer.php" method="post" enctype="multipart/form-data">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="year">Year: </label>
										<select class="browser-default custom-select" name="year">
											<option selected>Select Year</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="uploadQA">Upload Questions and Answers:</label>
										<input type="file" name="qaupload" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Select Course:</label>
										<select class="browser-default custom-select" name="course_code">
											<option >Select Course</option>
											<?php
											$query="select subject_name, course_code from course_subjects ORDER BY course_code ASC";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code'].": ".$row['subject_name']."</option>";
											}
										?>
										</select>
									</div>
								</div>
								<div class="col-md-6 mt-4">
									<div class="form-group pt-2">
										<input type="submit" name="sub" value="Add Question" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
									<th>File Name</th>
									<th>Year</th>
									<th>Course Code</th>
								</tr>
								<?php
									$query="select id, file_name, course_code, year from question_answer_files";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$row['id']."</td>";
									echo	"<td>".$row['file_name']."</td>";
									echo	"<td>".$row['year']."</td>";
									echo	"<td>".$row['course_code']."</td>";
									echo	"</tr>";
									} 
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
