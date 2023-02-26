<?php
if (isset($_POST['btn_save'])) {
	require_once "./connection/connection.php";
		// $roll_no= $_POST["roll_no"];

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];
 		
 		$last_name=$_POST["last_name"];
 		
 		$father_name=$_POST["father_name"];
 		
 		$email=$_POST["email"];
 		
 		$mobile_no=$_POST["mobile_no"];

 		$course_code=$_POST['course_code'];

 		$session=$_POST['session'];
 		
 		$prospectus_issued=$_POST["prospectus_issued"];
 		
 		$prospectus_amount=$_POST["prospectus_amount"];
 		
 		$form_b=$_POST["form_b"];
 		
 		$applicant_status=$_POST["applicant_status"];
 		
 		$application_status=$_POST["application_status"];
 		
 		// $state=$_POST["state"];
 		
 		$dob=$_POST["dob"];
 		 		
 		$gender=$_POST["gender"];
 		
		$permanent_address=$_POST["permanent_address"];
 		
 		$current_address=$_POST["current_address"];
 		
 		$place_of_birth=$_POST["place_of_birth"];
 		
 		// $matric_complition_date=$_POST["matric_complition_date"];
 		
 		// $matric_awarded_date=$_POST["matric_awarded_date"];
 		
 		// $fa_complition_date=$_POST["fa_complition_date"];
 		
 		// $fa_awarded_date=$_POST["fa_awarded_date"];
 		
 		// $ba_complition_date=$_POST["ba_complition_date"];
 		
 		// $ba_awarded_date=$_POST["ba_awarded_date"];

 		$password=$_POST['password'];

 		$role=$_POST['role'];

 		

// *****************************************Images upload code starts here********************************************************** 
		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		// $matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

		// $fa_certificate = $_FILES['fa_certificate']['name'];$tmp_name=$_FILES['fa_certificate']['tmp_name'];$path = "images/".$fa_certificate;move_uploaded_file($tmp_name, $path);

		// $ba_certificate = $_FILES['ba_certificate']['name'];$tmp_name=$_FILES['ba_certificate']['tmp_name'];$path = "images/".$ba_certificate;move_uploaded_file($tmp_name, $path);


// *****************************************Images upload code end here********************************************************** 

 		$query="Insert into student_info(first_name,middle_name,last_name,father_name,email,mobile_no,course_code,session,profile_image,prospectus_issued,prospectus_amount,form_b,applicant_status,application_status,dob,gender,permanent_address,current_address,place_of_birth,semester)values('$first_name','$middle_name','$last_name','$father_name','$email','$mobile_no','$course_code','$session','$profile_image','$prospectus_issued','$prospectus_amount','$form_b','$applicant_status','$application_status','$dob','$gender','$permanent_address','$current_address','$place_of_birth','1')";
 		$run=mysqli_query($con, $query);
 		$query1="Insert into login(name,user_id,Password,Role)values('$middle_name','$email','student123*','Student')";
 		$run1=mysqli_query($con, $query1);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration form - DIT</title>
	<link rel="shortcut icon" href="./Images/logo-DIT.png" type="image/x-icon">
</head>
<body>
	<?php include('common/header.php') ?>
	<?php require_once "./Connection/connection.php"; ?>
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-xl-12 col-lg-12 col-md-12 w-100">
				<div class="bg-info text-center">
					<div class="table-one flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
						<h4>Online Addmission Form</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row m-3">
			<div class="col-md-12">
				<form action="admission.php" method="POST" enctype="multipart/form-data">
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Applicant First Name:*</label>
								<input type="text" name="first_name" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Applicant Middle Name:</label>
								<input type="text" name="middle_name" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Applicant Last Name:*</label>
								<input type="text" name="last_name" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Father Name:*</label>
								<input type="text" name="father_name" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Applicant Email:*</label>
								<input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile No:*</label>
								<input type="number" name="mobile_no" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Course which you want?: </label>
								<select class="browser-default custom-select" name="course_code">
									<option >Select Course</option>
									<?php
										$query="select course_code from courses";
										$run=mysqli_query($con,$query);
										print_r($run);
										while($row=mysqli_fetch_array($run)) {
											echo "<option value=".$row['course_code'].">".$row['course_code']."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Select Session:</label>
								<select class="browser-default custom-select" name="session">
									<option >Select Session</option>
									<?php
										$query="select session from sessions";
										$run=mysqli_query($con,$query);
										while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['session'].">".$row['session']."</option>";
										}
									?>
								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Your Profile Image:</label>
								<input type="file" name="profile_image" placeholder="Student Age" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Prospectus Issude: </label>
								<select class="browser-default custom-select" name="prospectus_issued">
									<option>Select Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Prospectus Amount Recvd:</label>
								<select class="browser-default custom-select" name="prospectus_amount">
									<option>Select Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Form B:</label>
								<input type="text" name="form_b" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Applicant Status: </label>
								<select class="browser-default custom-select" name="applicant_status">
									<option>Select Option</option>
									<option value="Admitted">Admitted</option>
									<option value="Not Admitted">Not Admitted</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Application Status:</label>
								<select class="browser-default custom-select" name="application_status">
									<option>Select Option</option>
									<option value="Approved">Approved</option>
									<option value="Not Approved">Not Approved</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Date of Birth: </label>
								<input type="date" name="dob" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Other Phone:</label>
								<input type="number" name="other_phone" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Gender:</label>
								<select class="browser-default custom-select" name="gender">
									<option>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Permanent Address: </label>
								<input type="text" name="permanent_address" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Current Address:</label>
								<input type="text" name="current_address" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Place of Birth:</label>
								<input type="text" name="place_of_birth" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="password">Password: </label>
								<input type="text" name="password" class="form-control">
							</div>
						</div>
					</div>
					<!-- _________________________________________________________________________________
														Hidden Values are here
					_________________________________________________________________________________ -->
					<div>
						<!-- <input type="hidden" name="password" value="student123*"> -->
						<input type="hidden" name="role" value="Student">
					</div>
					<!-- _________________________________________________________________________________
														Hidden Values are end here
					_________________________________________________________________________________ -->
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary px-5" name="btn_save">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 w-100 p-5">
				<h4 class="bg-secondary p-3 text-center text-white">Undertaking</h4>
				<h5>Candidates awaiting results are required to sign the following undertaking:</h5>
				<p class="tet-justify">
					I solemnly declare that I have submitted the application with the consent of my father / guardian. I pledge to abide by the Rules and Regulations of the ICBS Lahore and shall not take part in political activities of any kind. If I do so the ICBS Administration will have the right to strike my name off the ICBS Rolls. I pledge that I will not keep in my possession weapons of any kind whether licensed or unlicensed. I affirm that I was never expelled / rusticated by any Institution at any time. I understand that if my class attendance percentage is not up to the required standard of the ICBS, I will not be eligible to sit in the final examinations. I affirm that if at any stage the documents submitted by me for admission are proved forged, fake, or erroneous I shall be responsible for that and the ICBS Administration shall be rightful to cancel my admission and to take necessary action against me.
					I solemnly declare that I have submitted the application with the consent of my father / guardian. I pledge to abide by the Rules and Regulations of the ICBS Lahore and shall not take part in political activities of any kind. If I do so the ICBS Administration will have the right to strike my name off the ICBS Rolls. I pledge that I will not keep in my possession weapons of any kind whether licensed or unlicensed. I affirm that I was never expelled / rusticated by any Institution at any time. I understand that if my class attendance percentage is not up to the required standard of the ICBS, I will not be eligible to sit in the final examinations. I affirm that if at any stage the documents submitted by me for admission are proved forged, fake, or erroneous I shall be responsible for that and the ICBS Administration shall be rightful to cancel my admission and to take necessary action against me..
				</p>
			</div>
		</div>	
	</div>
</body>
</html>