<!-- PHP Starts Here -->
<?php
session_start();
    require_once "../connection/connection.php";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];

        $query="select * from login where user_id='$username'";
        $result=mysqli_query($con,$query);
        $query1="select * from login where user_id='$username' and Password='$password' ";
        $result1=mysqli_query($con,$query1);
        if (mysqli_num_rows($result)>0) {
            if (mysqli_num_rows($result1)>0) {
                while ($row=mysqli_fetch_array($result)) {
                    if ($row["Role"]=="Admin")
                    {
                        $_SESSION['LoginAdmin']=$row["user_id"];
                        header('Location: ../admin/admin-index.php');
                    }
                    else if ($row["Role"]=="Teacher" and $row["account"]=="Activate")
                    {
                        $_SESSION['LoginTeacher']=$row["user_id"];
                        header('Location: ../teacher/teacher-index.php');
                    }
                    else if ($row["Role"]=="Teacher" and $row["account"]=="Deactivate")
                    {
                        $_SESSION['LoginTeacher']=$row["user_id"];
                        header('Location: ../login/deactivate.php');
                    }
                    else if ($row["Role"]=="Student" and $row["account"]=="Activate")
                    {
                        $_SESSION['LoginStudent']=$row['user_id'];
                        header('Location: ../student/student-index.php');
                    }
                    else if ($row["Role"]=="Student" and $row["account"]=="Deactivate")
                    {
                        $_SESSION['LoginStudent']=$row['user_id'];
                        header('Location: ../login/deactivate.php');
                    }
                }
            }else{
                echo '<script>alert("Email Or Password Does Not Match.")</script>';
            }
        }
        else
        {
            // header("Location: login.php");
            echo '<script>alert("This email id is not registered.")</script>';
        }
    }
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Login - DIT</title>
        <link rel="shortcut icon" href="../Images/logo-DIT.png" type="image/x-icon">
	</head>
	<body class="login-background">
		<?php include('../common/common-header.php') ?>
        <div class="login-div mt-3 rounded">
            <div class="logo-div text-center">
                <img src="../Images/logo-DIT.png" alt="" class="align-items-center" width="100" height="100">
            </div>
            <div class="login-padding">
                <h2 class="text-center text-white">LOGIN</h2>
                <form class="p-1" action="login.php" method="POST">
                    <div class="form-group">
                        <label><h6>Enter Your ID/Email:</h6></label>
                        <input type="text" name="email" placeholder="Enter User ID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Enter Password:</h6></label>
                        <input type="Password" name="password" placeholder="Enter Password" class="form-control border-bottom" required>
                    </div>
                    <div class="form-group text-center mb-3 mt-4">
                        <input type="submit" name="btnlogin" value="LOGIN" class="btn btn-white pl-5 pr-5 ">
                    </div>
                </form>
                <a class="form-group text-center" style="color: white;" href="../login/Register.php">New User?</a>
            </div>
        </div>
    </body>
</html>



