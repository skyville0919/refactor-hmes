<?php include ('header.php'); ?>

<?php
	ob_start();
	session_start();

	$firstnameError = "";
	$lastnameError = "";
	$middlenameError = "";
	$emailaddressError = "";
	$passwordError = "";

	$error = false;

	if ( isset($_POST['btn-register']))
	{
		$firstname = trim($_POST['user_firstname']);
		$firstname = strip_tags($firstname);
		$firstname = htmlspecialchars($firstname);	

		$lastname = trim($_POST['user_lastname']);
		$lastname = strip_tags($lastname);
		$lastname = htmlspecialchars($lastname);	

		$emailaddress = trim($_POST['user_emailaddress']);
		$emailaddress = strip_tags($emailaddress);
		$emailaddress = htmlspecialchars($emailaddress);

		$userpass = trim($_POST['user_password']);
		$userpass = strip_tags($userpass);
		$userpass = htmlspecialchars($userpass);


		$emailaddress = filter_var($emailaddress, FILTER_SANITIZE_EMAIL);

		if ( empty($firstname))
		{
			$error = true;
			$firstnameError = "** Enter your first name **";
		}

		if ( empty($lastname))
		{
			$error = true;
			$lastnameError = "** Enter your last name **";
		}


		if ( empty($emailaddress))
		{
			$error = true;
			$emailaddressError = "** Enter your email address **";
		}

		if ( empty($userpass))
		{
			$error = true;
			$passwordError = "** Enter your password **";
		}

		if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) !== false)
		{
	 		$error = true;
	 		$emailaddressError = "** Enter a valid email address **";
		}

		if (!$error)
		{
			$query = "INSERT INTO user(user_firstname, user_lastname, user_emailaddress, user_password, user_images) VALUES(UPPER('$firstname'), UPPER('$lastname'), '$emailaddress', '$userpass', 'assets/images/avatars/avatar.png')";
			
			$results = mysql_query($query);

				if($results)
				{
					$successMsg = "Registered successfully. Once approved, we'll get back to you through email.";
					?>
					<script>
						var delay = 3000;
						setTimeout(function(){ window.location = 'index.php'}, delay);
					</script>
					<?php
				}
				else
				{
					$errorMsg = "Error encountered";
					?>
					<script>
						var delay = 3000;
						setTimeout(function(){ window.location = 'index.php'}, delay);
					</script>
					<?php
				}
		}

	}

?>

<body class="login-layout light-login">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container register-container">

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box border">
								<div class="widget-body border">
									<div class="widget-main border">
										<h4 class="login-header">
											<i class="ace-icon fa fa-user"></i> SIGN-UP
										</h4>

										<div class="space-6"></div>

											<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
												<fieldset>

													<?php
														if (isset($successMsg))
														{
															?>
															<div class="form-group">
																<div class="login-alert-success-register fa fa-check-square-o">
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

													<label class="block clearfix label-register">First Name
														<span class="block input-icon input-icon-right">
														<input type="text" class="form-control" placeholder="First Name" id="user_firstname" name="user_firstname"/>
														<span class="login-error"><?php echo $firstnameError; ?></span>
														</span>
													</label>

													<label class="block clearfix label-register">Last Name
														<span class="block input-icon input-icon-right">
														<input type="text" class="form-control" placeholder="Last Name" id="user_lastname" name="user_lastname"/>
														<span class="login-error"><?php echo $lastnameError; ?></span>
														</span>
													</label>

													<label class="block clearfix label-register">Email Address
														<span class="block input-icon input-icon-right">
														<input type="text" class="form-control" placeholder="Email Address" id="user_emailaddress" name="user_emailaddress"/>
														<span class="login-error"><?php echo $emailaddressError; ?></span>
														</span>
													</label>

													<label class="block clearfix label-register">Password
														<span class="block input-icon input-icon-right">
														<input type="password" class="form-control" placeholder="Password" id="user_password" name="user_password"/>
														<span class="login-error"><?php echo $passwordError; ?></span>
														</span>
													</label>

													<label class="block clearfix label-register">Confirm Password
														<span class="block input-icon input-icon-right">
														<input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password" name="confirm_password" onkeyup="validate();"/>
														<p id="validate-status"></p>
														</span>
													</label>

													<label class="block clearfix">
														<button type="submit" class="btn-sandz" id="btn-register" name="btn-register">
														<i class="ace-icon login-icon fa fa-sign-in"></i>
														<span class="login-text"> Register</span>
														</button>
													</label>

													<div class="space"></div>

														<label class="block clearfix">
															<span class ="blue-bold">
															<i class="ace-icon blue fa fa-arrow-left"></i>
															<a  href="index.php"> Back to Login</a></span>
														</label>

													<div class="space-4"></div>

												</fieldset>
											</form>

											<script>

												function validate()
												{
													var user_password = $("#user_password").val();
													var confirm_password = $("#confirm_password").val();

													if(user_password == confirm_password)
													{
														$("#validate-status").text("** Password Matched **"); 
													}
													else
													{
														$("#validate-status").text("** Password did not matched **");  
													}

												}

											</script>

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

