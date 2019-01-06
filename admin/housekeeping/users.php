<?php include('header.php'); ?>


<?php

$firstnameError="";
$lastnameError="";
$emailaddressError="";
$passwordError="";

	ob_start();
	session_start();

	$error = false;

	if ( isset($_POST['btn-save']))
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
			$query = "INSERT INTO accounts(F_Name, L_Name, Email, Password, Icon, Code) VALUES(UPPER('$firstname'), UPPER('$lastname'), '$emailaddress', '$userpass', '../images/pictures/avatar.png','1')";
			
			$results = mysqli_query($db,$query);
			echo $query;
				if($results)
				{

					$successMsg = "Registered successfully.";
					?>
					<script>
						var delay = 3000;
						setTimeout(function(){ window.location = 'users.php'}, delay);
					</script>
					<?php
				}
				else
				{

					$errorMsg = "Error encountered";
					?>
					<script>
						var delay = 3000;
						setTimeout(function(){ window.location = 'users.php'}, delay);
					</script>
					<?php
				}
		}

	}

	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE accounts SET Code = '0' WHERE Acc_ID = ".$_GET['delete_id'];
		$results = mysqli_query($db,$query);

		if($results)
		{
			$successMsg = "** Successfully deleted **";

			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'users.php'}, delay);
			</script>
			<?php
		}

		else
		{
			$errorMsg = "** Error encountered **";
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'users.php'}, delay);
			</script>
			<?php
		}
	}

?>

	<script type="text/javascript">

		function edit_id(id)
		{
				window.location.href='edit_users.php?edit_id='+id;
		}

		function delete_id(id)
		{
			if(confirm('Sure to delete?'))
			{
				window.location.href='users.php?delete_id='+id;
			}
		}
		
	</script>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_users.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
							<?php include ('breadcrumb_users.php'); ?>
								<div class="page-content">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">

												<div class="space-4"></div>

												<?php
													if (isset($successMsg))
													{
														?>
														<div class="form-group">
															<div class="adding-alert-success fa fa-check-square-o">
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
															<div class="adding-alert-error fa fa-exclamation-triangle">
																<?php echo $errorMsg; ?>
															</div>
														</div>
														<?php
													}
												?>

												<div class="col-md-4">
													<div class="widget-box">	
														<div class="widget-header widget-header-flat adding-header">
															<i class="ace-icon fa fa-plus-square"></i> ADD USER
														</div>

														<form class="add-user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
															<fieldset>

																<label class="block clearfix label-user">First Name
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_firstname" name="user_firstname"/>
																	<span class="login-error"><?php echo $firstnameError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Last Name
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_lastname" name="user_lastname"/>
																	<span class="login-error"><?php echo $lastnameError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Email Address
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_emailaddress" name="user_emailaddress"/>
																	<span class="login-error"><?php echo $emailaddressError; ?></span>
																	</span>
																	<p class="log"
																</label>

																<label class="block clearfix label-user">Password
																	<span class="block input-icon input-icon-right">
																	<input type="password" class="form-control" id="user_password" name="user_password"/>
																	<span class="login-error"><?php echo $passwordError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Confirm Password
																	<span class="block input-icon input-icon-right">
																	<input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup="validate();"/>
																	<p id="validate-status"></p>
																	</span>
																</label>

																<label class="block clearfix">
																	<button type="submit" class="btn btn-primary" id="btn-save" name="btn-save">
																	<i class="ace-icon login-icon fa fa-save"></i>
																	<span class="login-text"> SAVE</span>
																	</button>
																</label>

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
														
													</div>
												</div>

												<?php 

													$query = "SELECT * FROM accounts WHERE Code = '1'";
													$results = mysqli_query($db,$query);
													$count = mysqli_num_rows($results);

												?>

												<div class="col-md-8">
													<div class="clearfix"></div>
														<div class="top widget-box">
															<div class="table-header">
																<i class="ace-icon fa fa-align-justify"></i> LIST OF USERS
																<i class="float-right"> Number of Users: <span class="badge badge-primary"><?php echo $count; ?></span></i>
															</div>

																<table id="dynamic-table" class="display table table-striped table-bordered">
																	<thead class="smaller-font">
																		<tr>
																			<th></th>
																			<th>NAME</th>
																			<th>EMAIL ADDRESS</th>
																			<th></th>
																		</tr>
																	</thead>

																	<tbody>

																	<?php

																		$query = "SELECT * FROM accounts WHERE Code ='1'";
																		$result = mysqli_query($db,$query);

																			if(mysqli_num_rows($result) > 0)
																				{
																					while($row = mysqli_fetch_array($result))
																						{
																	?>

																		<tr class="smaller-font-1">
																			<td class="center"><?php echo $row['Acc_ID']; ?></td>
																			<td><?php echo $row['F_Name']. ' ' .$row['L_Name']; ?></td>
																			<td><?php echo $row['Email']; ?></td>
																			<td class="center">
																				<a href="javascript:edit_id('<?php echo $row['Acc_ID']; ?>')" class="btn btn-xs btn-success bt-btn"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i>Edit</a>

																				<a href="javascript:delete_id('<?php echo $row['Acc_ID']; ?>')" class="btn btn-xs btn-danger bt-btn"><i class="ace-icon fa fa-trash bigger-120"></i>Delete</a>
																				
																			</td>
																		</tr>
																						
																	<?php
																						}
																				}

																						
																	?>
									
																	</tbody>
																</table>
														</div>

														<div class="clearfix clear">
															<div class="pull-right tableTools-container"></div>
														</div>
														
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<?php include ('script.php'); ?>

	</body>

<?php ob_end_flush(); ?>


