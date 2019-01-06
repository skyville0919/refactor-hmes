<?php include ('header.php'); ?>

<?php
	ob_start();
	session_start();

	$error = false;

	if( isset($_POST['btn-cancel']) )
	{
		header("Location: home.php");
	}


   if( isset($_FILES['image']) )
   {

      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_temp = explode('.',$_FILES['image']['name']);
      $file_ext = end($file_temp);
      
      $expensions= array("jpeg","jpg","png","gif","JPG");
      
      if( in_array($file_ext,$expensions) == false)
      {
	  	 $errorMsg = "Extension not allowed, please choose a JPEG or PNG file.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'upload_picture.php'}, delay);
		 </script>
		 <?php
      }
      
      else if($file_size > 2097152)
      {
	  	 $errorMsg = "File size must be exatcly 2MB.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'upload_picture.php'}, delay);
		 </script>
		 <?php
      }
      
      else if( !$error )
      {
         move_uploaded_file($file_tmp,'assets/images/avatars/'.$file_name);
	  	 $successMsg = "Image successfully uploaded.";

	  	 //update mo mukha mo
         $qry_img = "UPDATE accounts SET Icon = 'assets/images/avatars/" .$file_name. "' WHERE Acc_ID =" .$_SESSION['accounts'];
         $img_r = mysqli_query($db,$qry_img);
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'home.php'}, delay);
		 </script>
		 <?php
      }
      else
      {
	  	 $errorMsg = "Error uploading image.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'upload_picture.php'}, delay);
		 </script>
		 <?php
      }

   }

?>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_uploadpicture.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
							<?php include ('breadcrumb_uploadpicture.php'); ?>
								<div class="page-content">
									<div class="row">
										<div class="col-xs-12">

											<div id="user-profile-2" class="user-profile">
												<div class="tabbable">
													<div class="tab-content no-border padding-24">
														<div id="home" class="tab-pane in active">
															<div class="row">
														
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

																<form method="post" enctype="multipart/form-data">
																	<div class="col-xs-12 col-sm-5 center">
																		<span class="profile-picture">
																			<img class="picture editable img-responsive" id="avatar2" src="<?php echo $userrow['user_images']; ?>" />
																		</span>

																		<div class="space space-4"></div>

																		<input type="file" class="btn btn-sm btn-block btn-primary" name="image" id="image" accept=".png, .jpg, .jpeg , .gif">

																	</div><!-- /.col -->

																	<div class="col-xs-12 col-sm-7">
																		<h4 class="blue">
																			<span class="details">USER'S DETAILS</span>
																		</h4>

																		<div class="profile-user-info">
																			<div class="profile-info-row">
																				<div class="profile-info-name picture-label"> First Name:</div>

																				<div class="profile-info-value">
																					<span class="details-1"><?php echo $userrow['F_Name']; ?></span>
																				</div>
																			</div>

																			<div class="profile-info-row">
																				<div class="profile-info-name picture-label"> Last Name: </div>

																				<div class="profile-info-value">
																					<span class="details-1"><?php echo $userrow['L_Name']; ?></span>
																				</div>
																			</div>

																			<div class="profile-info-row">
																				<div class="profile-info-name picture-label"> Email Address </div>

																				<div class="profile-info-value">
																					<span class="details-1"><?php echo $userrow['Email']; ?></span>
																				</div>
																			</div>

																			<br />

																		</div>

																		<div>
																			<div class="btn-lgn lef">
																				<button type="submit" class="btn btn-danger bt-btn" name="btn-cancel" id="btn-cancel"><i class="ace-icon fa fa-times bigger-120"></i> CANCEL </button>

																				<button type="submit" class="btn btn-primary bt-btn" name="submit" id="submit"><i class="ace-icon fa fa-floppy-o bigger-120"></i> UPLOAD </button>
																			</div>
																		</div>
																	
																	</div><!-- /.col -->
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
					</div>
				</div>
			</div>
			
		<?php include ('script.php'); ?>

	</body>
