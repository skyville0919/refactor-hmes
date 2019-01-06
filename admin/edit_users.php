<?php include ('header.php'); ?>

<?php
	ob_start();
	session_start();

	if( isset($_GET['edit_id']))
	{
		$query = "SELECT * FROM packages WHERE package_id=".$_GET['edit_id'];
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);
	}

	$error = false;

	if ( isset($_POST['btn-update']))
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

		if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) !== false)
		{
	 		$error = true;
	 		$emailaddressError = "** Enter a valid email address **";
		}

		if (!$error)
		{
			$quer = "UPDATE accounts SET F_Name = '$firstname', L_Name = '$lastname', Email = '$emailaddress' WHERE Acc_ID=".$_GET['edit_id'];
			
			$res = mysqli_query($quer);

				if($res)
				{
					$successMsg = "Updated successfully.";
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
		$results = mysql_queryi($query);

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

		
	if(isset($_POST['btn-cancel']))
	{
		header("Location: users.php");
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
															<i class="ace-icon fa fa-plus-square"></i> EDIT USER
														</div>

														<form class="add-user" method="post">
															<fieldset>

																<label class="block clearfix label-user">First Name
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_firstname" name="user_firstname" value="<?php echo $row['F_Name']; ?>"/>
																	<span class="login-error"><?php echo $firstnameError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Last Name
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $row['L_Name']; ?>"/>
																	<span class="login-error"><?php echo $lastnameError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Email Address
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_emailaddress" name="user_emailaddress" value="<?php echo $row['Email']; ?>"/>
																	<span class="login-error"><?php echo $emailaddressError; ?></span>
																	</span>
																</label>

																<br/>

																<label class="block clearfix">
																	<button type="submit" class="btn btn-primary" id="btn-update" name="btn-update">
																	<i class="ace-icon login-icon fa fa-save"></i>
																	<span class="login-text"> UPDATE</span>
																	</button>

																	<button type="submit" class="btn btn-danger" id="btn-cancel" name="btn-cancel">
																	<i class="ace-icon login-icon fa fa-remove"></i>
																	<span class="login-text"> CANCEL</span>
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
																			<th>EMAIL</th>
																			<th class="hidden"></th>
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
																			<td class="hidden"></td>
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


