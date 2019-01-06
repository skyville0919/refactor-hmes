<?php include('connection.php') ?>


<?php
	ob_start();
	session_start();

	
    // if(isset($_SESSION['accounts']) != "") {
    //     header("Location:../index.php");
    //     exit;
    // }
	
	$emailError = "";
	$passwordError = "";


	$error = false;

	if(isset($_POST['login'])) {

		$email = trim($_POST['email']);
     	$email = strip_tags($email);
		$email = htmlspecialchars($email);
		  
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);

		if(empty($email)) {
			$error = true;
			$emailError = "Please inout your email.";
		}

		if(empty($password)) {
			$error = true;
			$passwordError = "Please input your password.";
		}

         if (!filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
			 $error = true;
			 $emailError = "Please enter a valid email.";
		 }


		if(!$error) {
			$query = "SELECT * FROM accounts WHERE Email = '$email' ";
			$result = mysqli_query($db, $query);
			if(mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result);
				$password_hash = $row['Password'];
					if(password_verify($password, $password_hash)) {
						if($isVerified = '0') {
							$errorMsg = "Please verify your emailaddress.";
						} else {
							$_SESSION['accounts'] = $row['Acc_ID'];
							header("Location:../index.php");
						}
			} else {
				$errorMsg = "Please check your iputs.";
			}
		} else {
			$errorMsg = "Please check your inputs.";
		}
	}
}
// ?>
	

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../bootsrap/js/bootstrap.min.js"></script>
<script src="../bootsrap/js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<link rel="shortcut icon" href="logo.png">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="../bootsrap/css/fontawesome.css">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="../fontawesome/css/all.css">



</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" autocomplete="off">
				<fieldset>
				<?php 
					if(isset($errorMsg)) {
				?>
				<span class="login-error"> <?php echo $errorMsg; ?></span>
				<script>
                    var delay = 1500;
                    setTimeout(function{
                        window.location = 'index.php'
                        },delay
                    ) 
                </script>
				<?php
					}
				?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="email" class="form-control" placeholder="Email">
					</div>
					<span class="login-error"><?php echo $emailError; ?></span>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="password" type="password" class="form-control" placeholder="password">
					</div>
						<span class="login-error"><?php echo $passwordError; ?></span>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="LOGIN" class="btn float-right login_btn">
					</div>
				</fieldset>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>