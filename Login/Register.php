<!-- PHP Starts Here -->
<?php
session_start();
    require_once "../connection/connection.php";
    $message="Email Or Password Does Not Match";
    if(isset($_POST["btnlogin"]))
    {
        // print_r($_POST);
        $username= $_POST["email"];
        $password= md5($_POST["password"]);
        $role= $_POST["role"];

        $query="select * from login where user_id='$username'";
        $result=mysqli_query($con,$query);
        // print_r($result);
        if ($role == "Select") {
            echo "Please select your role.";
                    // header('Location: ../admin/admin-index.php');
        }else if($role != "Select"){
            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO login (`user_id`, `Password`, `Role`) VALUES ('$username','$password','$role')";
                $result=mysqli_query($con,$query);
                $query = "SELECT * FROM login where user_id='$username' ";
                $data=mysqli_query($con,$query);
                $row= mysqli_fetch_array($data);
                if (($result == 1) && ($role == "Admin")) {
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../admin/admin-index.php');
                }else if(($result == 1) && ($role == "Teacher")){
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../admin/admin-index.php');
                }else if(($result == 1) && ($role == "Student")){
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../admin/admin-index.php');
                }
            //     while ($row=mysqli_fetch_array($result)) {
            //         if ($row["Role"]=="Admin")
            //         {
            //             $_SESSION['LoginAdmin']=$row["user_id"];
            //             header('Location: ../admin/admin-index.php');
            //         }
            //         else if ($row["Role"]=="Teacher" and $row["account"]=="Activate")
            //         {
            //             $_SESSION['LoginTeacher']=$row["user_id"];
            //             header('Location: ../teacher/teacher-index.php');
            //         }
            //         else if ($row["Role"]=="Student" and $row["account"]=="Activate")
            //         {
            //             $_SESSION['LoginStudent']=$row['user_id'];
            //             header('Location: ../student/student-index.php');
            //         }
            //     }
            }else{
                echo '<script>alert("This email id is already registered.")</script>';
            }
        }
        else
        { 
            header("Location: Register.php");
        }
    }
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Register - DIT</title>
        <link rel="shortcut icon" href="../Images/logo-DIT.png" type="image/x-icon">
	</head>
	<body class="login-background">
		<?php include('../common/common-header.php') ?>
        <div class="login-div mt-3 rounded">
            <div class="logo-div text-center">
                <img src="../Images/logo-DIT.png" alt="" class="align-items-center" width="90" height="90">
            </div>
            <div class="login-padding">
                <h2 class="text-center text-white">REGISTER</h2>
                <form class="p-1" action="Register.php" method="POST">
                    <div class="form-group">
                        <label><h6>Enter Your ID/Email:</h6></label>
                        <input type="text" name="email" placeholder="Enter User ID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Enter Password:</h6></label>
                        <input type="Password" name="password" placeholder="Enter Password" class="form-control border-bottom" required>
                        <!-- <?php echo $message; ?> -->
                    </div>
                    <div class="form-group">
                        <label><h6>Select Role:</h6></label>
                        <select class="form-control border-bottom" name="role">
                            <option value="Select">Select</option>
                            <option value="Admin">Admin</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Student">Student</option>
                        </select>
                    </div>
                    <div class="form-group text-center mb-3 mt-4">
                        <input type="submit" name="btnlogin" value="REGISTER" class="btn btn-white pl-5 pr-5 ">
                    </div>
                </form>
                <a class="form-group text-center" style="color: white;" href="../login/Login.php">Already User?</a>
            </div>
        </div>
    </body>
</html>



