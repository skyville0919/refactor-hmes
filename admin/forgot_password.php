<?php include ('header.php'); ?>

<?php
	ob_start();
	session_start();

	$error = false;

	if ( isset($_POST['btn-pass']))
	{

		$emailaddress = trim($_POST['user_emailaddress']);
		$emailaddress = strip_tags($emailaddress);
		$emailaddress = htmlspecialchars($emailaddress);

		$emailaddress = filter_var($emailaddress, FILTER_SANITIZE_EMAIL);


		if ( empty($emailaddress))
			{
				$error = true;
				$emailaddressError = "** Enter your email address **";
			}

		if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) !== false)
		{
	 		$error = true;
	 		$emailaddressError = "** Enter a valid email address **";
		}

		if (!$error)
		{	
			$check_email = "SELECT user_emailaddress FROM user WHERE user_emailaddress = '$emailaddress'";
			$results_email = mysql_query($check_email);
			$count_email = mysql_num_rows($results_email);

			if ( $count_email == 1)
			{
				$query = "SELECT * FROM user where user_emailaddress = '$emailaddress'";
				$results = mysql_query($query);
				$rows = mysql_fetch_array($results);

				//para sa mga nakalimot
				$password = substr(md5(uniqid(rand(),1)),3,10);
				//encrypted version for database entry
				$pass = md5($password);

				//sending email
				$to = $emailaddress;
				$subject = "Password Recovery";
				$from = 'emmabells24@gmail.com';
				$body = "Hi, " .$rows['user_firstname']. " " .$rows['user_lastname']. "! Your password is " .$password. ". Thank you!";
	            $headers = "From: " . strip_tags($from) . "\r\n";
	            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	            $headers .= "MIME-Version: 1.0\r\n";
	            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	            //test kung napapasa data
	            // echo $to.'<br/>';
	            // echo $password.'<br/>';
	            // echo $subject.'<br/>';
	            // echo $from.'<br/>';
	            // echo $body.'<br/>';

				//mail
				mail($to, $subject, $body, $headers);

				//updating the database
				$sql = "UPDATE user SET user_password = '$password' WHERE user_emailaddress = '$emailaddress'";
				$res = mysql_query($sql);
				$sent = true;
			}
			else
			{
				$errorMsg = "Your email doesn't exist";
				?>
				<script>
					var delay = 1500;
					setTimeout(function(){ window.location = 'index.php'}, delay);
				</script>
				<?php
			}
				
		}


	}

	//show any errors
	if (!empty($error))
	{
		$i = 0;
		while ($i < count($error))
		{
			echo "<div class='error-msg'>".$error[$i]."</div>";
		$i ++;
		}
	}
	// close if empty errors

	if ($sent == true)
	{
		$successMsg = "New password was sent to your email.";
		?>
		<script>
			var delay = 1500;
			setTimeout(function(){ window.location = 'index.php'}, delay);
		</script>
		<?php
	}
?>


<body class="login-layout light-login">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box border">
								<div class="widget-body border">
									<div class="widget-main border">
										<h4 class="login-header">
											<i class="ace-icon fa fa-question-circle"></i> PASSWORD
										</h4>

										<div class="space-6"></div>

											<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
												<fieldset>

													<?php
														if (isset($successMsg))
														{
															?>
															<div class="form-group">
																<div class="login-alert-success fa fa-check-square-o">
																	<?php echo $successMsg; ?>
																</div>
															</div>
															<?php
														}
													?>

													<?php
														if (isset($errorMsg))
														{
															?>
															<div class="form-group">
																<div class="login-alert-error fa fa-exclamation-triangle">
																	<?php echo $errorMsg; ?>
																</div>
															</div>
															<?php
														}
													?>

													<label class="block clearfix center">
														<span class="no-account">Forgot your password? Don't worry we'll send it to you.</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
														<input type="text" class="form-control" placeholder="Email Address" id="user_emailaddress" name="user_emailaddress"/>
														<i class="ace-icon fa fa-envelope"></i>
														<span class="login-error"><?php echo $emailaddressError; ?></span>
														</span>
													</label>

													<label class="block clearfix">
														<button type="submit" class="btn-sandz" id="btn-pass" name="btn-pass">
														<i class="ace-icon login-icon fa fa-envelope"></i>
														<span class="login-text"> Email me</span>
														</button>
													</label>

													<div class="space"></div>

														<label class="block clearfix">
															<span class="blue-bold">
															<i class="ace-icon blue fa fa-arrow-left"></i>
															<a href="index.php"> Back to Login</a></span>
														</label>

													<div class="space-4"></div>

												</fieldset>
											</form>

									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->

						</div><!-- /.position-relative -->

					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->

			<?php include ('footer.php'); ?>

		</div><!-- /.main-content -->
	</div><!-- /.main-container -->

	<?php include ('script.php'); ?>

</body>

<?php ob_end_flush(); ?>

