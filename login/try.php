<?php include('connection.php') ?>



<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	ob_start();
	session_start();


	//error variables

	$firstnameError = "";
	$lastnameError = "";
	$middlenameError = "";
	$emailError = "";
	$contactError = "";
	$addressError = "";
	$passwordError = "";

	//error variables end
	
	$error = false;

	if(isset($_POST['register'])) {
		$firstname = trim($_POST['firstname']);
		$firstname = strip_tags($firstname);
		$firstname = htmlspecialchars($firstname);

		$lastname = trim($_POST['lastname']);
		$lastname = strip_tags($lastname);
		$lastname = htmlspecialchars($lastname);

		$middlename = trim($_POST['middlename']);
		$middlename = strip_tags($middlename);
		$middlename = htmlspecialchars($middlename);

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$contact = trim($_POST['contact']);
		$contact = strip_tags($contact);
		$contact = htmlspecialchars($contact);

		$address = trim($_POST['address']);
		$address = strip_tags($address);
		$address = htmlspecialchars($address);

		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if(empty($firstname)) {
			$error = true;
			$firstnameError = "** Enter your firstname **";
		}
	
		if(empty($lastname)) {
			$error = true;
			$lastnameError = "** Enter your lastname **";
		}
	
		if(empty($middlename)) {
			$error = true;
			$middlenameError = "** Enter your middlename **";
		}
	
		if(empty($email)) {
			$error = true;
			$emailError = "** Enter your email **";
		}
	
		if(empty($contact)) {
			$error = true;
			$contactError = "** Enter your contact **";
		}
	
		if(empty($address)) {
			$error = true;
			$addressError = "** Enter your address **";
		}
	
		if(empty($password)) {
			$error = true;
			$passwordError = "** Enter a password **";
		}
	
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
				 $error = true;
				 $emailError = "** Enter a valid email address **";
		}
		
		$query = "SELECT id FROM customer_accounts WHERE email='$email'" ;
		$result = mysqli_query($db,$query);
	
		if(mysqli_num_rows($result) > 0) {
			
			$error = true;
			$emailError = "** Email already exist **";
		}
		else {
		
		$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!$/*';
		$token = str_shuffle($token);
		$token = substr($token, 0, 10);
		}
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	
		if(!$error) {
			$query = "INSERT INTO customer_accounts(firstname, lastname, middlename, email, contact, adress, password, isVerified, token, code) VALUES ('$firstname', '$lastname', '$middlename', '$email', '$contact', '$address', '$hashedPassword', '0', '$token', '1')";
			echo $query;
	
			$result = mysqli_query($db, $query);
	
			// include_once("phpmailer/PHPMailer.php");
	
			// $mail = new PHPMailer();
			// $mail->setFrom('noreply@hmes.com');
			// $mail->addAddress($email, $firstname);
			// $mail->subject = "HMES email verification";
			// $mail->isHTML(true);
			// $mail->body = "
			// 	Please click on the link below to complete your registration:<br><br>
	
			// 	<a href='localhost/login/signup.php'/>Click Here</a>
			// ";
	


//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 4;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'legaspireginald.rr@gmail.com';                 // SMTP username
    $mail->Password = 'mmjygrnmbls';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('noreply@hmes.com');
    $mail->addAddress($email, $firstname);     // Add a recipient
   

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'HMES email verification';
	$mail->Body    = "Please clink the link below to complete your registration:<br><br>
						<a href='localhost/hmes/login/confirm.php?email=$email&token=$token'>
							COMPLETE
						</a>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	} catch (Exception $e) {
    $mail->ErrorInfo;
	}
	
		if($result) {
			$successMsg = "An email verification has been sent to your email address.";
			?>
			<script>
				var delay = 500;
				setTimeout(function(){window.location = "signup.php"}, delay);
			</script>
			<?php
		} else {
			$errorMsg = "Error encountered.";
			?>
			<script>
				var delay = 500;
				setTimeout(function(){window.location = "signup.php"}, delay);
			</script>
			<?php
		}
	
		}

	}



?>


<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome/css/all.css">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> -->
		<link rel="stylesheet" href="styles.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>SIGN UP</title>
	</head>
	<body>
		
		<div class="container-fluid">
			<div class="col-6 offset-3 custm-container mt-4">
					<p class="text-center custm-header mt-4">SIGN UP</p>
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
					<div class="row mt-4">
						<div class="col-md-6">
							<label class="custm-label" for="firstname">First Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-user fa" arai-hidden="true"></i></span>
											<input type="text" class="form-control col-md-12" name="firstname" id="firstname" required>
									</div>
								</div>
						</div>

						<div class="col-md-6">
							<label class="custm-label" for="lastname">Last Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-user fa" arai-hidden="true"></i></span>
											<input type="text" class="form-control col-md-12" name="lastname" id="lastname" required>
									</div>
								</div>
						</div>	
					</div>

					<div class="row mt-2">
						<div class="col-6">
							<label  class="custm-label" for="middlename">Middle Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-user fa" arai-hidden="true"></i></span>
											<input type="text" class="form-control col-md-12" name="middlename" id="middlename">
									</div>
								</div>
						</div>

						<div class="col-6">
							<label class="custm-label" for="email">Email Address</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-envelope fa" arai-hidden="true"></i></span>
											<input type="email" class="form-control col-md-12" name="email" id="email" required>
									</div>
								</div>	
								<span class="login-error"><?php echo $emailError; ?></span>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-6">
							<label  class="custm-label" for="contact">Contact Number</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-address-card" arai-hidden="true"></i></span>
											<input type="text" class="form-control col-md-12" name="contact" id="contact" required>
									</div>
								</div>
						</div>

						<div class="col-6">
							<label class="custm-label" for="address">Address</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-address-card" arai-hidden="true"></i></span>
											<input type="text" class="form-control col-md-12" name="address" id="address" required>
									</div>
								</div>	
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-6">
							<label  class="custm-label" for="password">Password</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-key fa" arai-hidden="true"></i></span>
											<input type="password" class="form-control col-md-12" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
									</div>
								</div>
						</div>

						<div class="col-6">
							<label class="custm-label" for="confirm">Confirm Password</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-key fa" arai-hidden="true"></i></span>
											<input type="password" class="form-control col-md-12" name="confirm" id="confirm" onkeyup="validate();" required>
									</div>
								</div>
						</div>

					</div>

					<div class="row ml-2 mt-4">
						<button type="submit" class="btn btn-warning col-md-5" name="register">SIGN UP</button>
						<div class="col-md-6 ml-4 mt-2 custm-label">
							Already have an account?<a href="index.php">Log in</a>
						</div>
					</div>

					</form>

				

			</div>
		</div>

<script>

function validate() {
	var password = $("#password").val();
	var confirm = $("#confirm").val();

	if(password == confirm)
	{
		$("#validate-status").text("** Password Matched **"); 
	} else {
		$("#validate-status").text("** Password did not matched **");  
	}

}


	
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) { 
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) { 
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) { 
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

	</body>
</html>