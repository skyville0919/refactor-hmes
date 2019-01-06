<?php include ('header.php'); ?>

<?php
	ob_start();
	session_start();

	$oldpass_Error = "";
	$repwd_Error = "";

	$error = false;

	if(isset($_POST['btn-cancel']))
	{
		header("Location: home.php");
	}

	if(isset($_POST['btn-save']))
	{

      $old_password = $_POST['old_password'];
      $new_password = $_POST['new_password'];
      $re_password = $_POST['re_password'];

	  $query = "SELECT * FROM accounts WHERE Acc_ID=" .$_SESSION['accounts'];
      $check_pwd = mysqli_query($db, $query);
      $check_pass = mysqli_fetch_array($check_pwd);
      $change_pwd = $check_pass['Password'];

      if ($change_pwd == $old_password)
      {
      	if ($new_password == $re_password)
      	{
      		$update_qry = mysqli_query("UPDATE accounts SET Password = '".$new_password."' WHERE Acc_ID =" .$_SESSION['accounts']);

			$successMsg = "Password successfully changed.";
			?>
			<script>
				var delay = 2000;
				setTimeout(function(){ window.location = 'home.php'}, delay);
			</script>
			<?php
      	}
      	else
      	{
			$errorMsg = "Error encountered";
			?>
			<script>
				var delay = 3000;
				setTimeout(function(){ window.location = 'change_password.php'}, delay);
			</script>
			<?php
      	}
      }
      else
      {
			$errorMsg = "Incorrect old password.";
			?>
			<script>
				var delay = 3000;
				setTimeout(function(){ window.location = 'change_password.php'}, delay);
			</script>
			<?php
      }
    }

?>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_changepassword.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
							<?php include ('breadcrumb_changepassword.php'); ?>
								<div class="page-content">
									<div class="row">
										<div class="col-xs-5">
																						
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

											<div class="top widget-box">	
												<div class="widget-header widget-header-flat heads adding-header">
													<i class="ace-icon fa fa-lock"></i> CHANGE PASSWORD
												</div>

												<div class="space-2"></div>
													
												<div class="">
													<form method="post" class="add-user">
														<label class="block clearfix label-user">Old Password
															<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="old_password" name="old_password"/>
															<span class="login-error"><?php echo $oldpass_Error; ?></span>
															</span>
														</label>

														<label class="block clearfix label-user">New Password
															<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="new_password" name="new_password"/>
															</span>
														</label>

														<label class="block clearfix label-user">Confirm Password
															<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="re_password" name="re_password"/>
															<span class="login-error"><?php echo $repwd_Error; ?></span>
															</span>
														</label>

														<br/>
												
														<div class="bt-lgn">
															<button type="submit" class="btn btn-danger bt-btn" name="btn-cancel" id="btn-cancel"><i class="ace-icon fa fa-times bigger-120"></i> CANCEL </button>

															<button type="submit" class="btn btn-primary bt-btn" name="btn-save" id="btn-save"><i class="ace-icon fa fa-floppy-o bigger-120"></i> UPDATE </button>
														</div>
													</form>

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
