<!-- PHP Starts Here -->
<?php
    if(isset($_POST["btnlogin"]))
    {
        header("Location: login.php");
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
                <form class="p-1" action="deactivate.php" method="POST">
                    <h2 class="text-center text-white">Your Account is Disabled.</h2>

                    <h4 class="text-center text-white">Please Contact to Admin.</h4>
                    <div class="form-group text-center mb-3 mt-4">
                        <input type="submit" name="btnlogin" value="Try Again" class="btn btn-white pl-5 pr-5 ">
                    </div>
                </form>
<!--                 <h2 class="text-center text-white">LOGIN</h2>
                    <div class="form-group">
                        <label><h6>Enter Your ID/Email:</h6></label>
                        <input type="text" name="email" placeholder="Enter User ID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Enter Password:</h6></label>
                        <input type="Password" name="password" placeholder="Enter Password" class="form-control border-bottom" required>
                    </div>
                <a class="form-group text-center" style="color: white;" href="../login/Register.php">New User?</a> -->
            </div>
        </div>
    </body>
</html>



