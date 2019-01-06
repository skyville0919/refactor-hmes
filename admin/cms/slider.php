<?php include ('header.php'); ?>

<?php

$firstnameError="";
$lastnameError="";
$emailaddressError="";
	ob_start();
	session_start();

	$error = false;

   if( isset($_FILES['image']) )
   {

      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_temp = explode('.',$_FILES['image']['name']);
      $file_ext = end($file_temp);
      
      $expensions= array("jpeg","jpg","png","gif","JPG");

  	  $type = trim($_POST['type']);
	  $type = strip_tags($type);
      $type = htmlspecialchars($type);	

	  if ( empty($type))
	  {
		  $error = true;
		  $firstnameError = "** Enter type **";
	  }

      
      if( in_array($file_ext,$expensions) == false)
      {
	  	 $errorMsg = "Extension not allowed, please choose a JPEG or PNG file.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'slider.php'}, delay);
		 </script>
		 <?php
      }
      
      else if($file_size > 2097152)
      {
	  	 $errorMsg = "File size must be exatcly 2MB.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'slider.php'}, delay);
		 </script>
		 <?php
      }
      
      else if( !$error )
      {
         move_uploaded_file($file_tmp,'../../images/sliders/'.$file_name);
	  	 $successMsg = "Image successfully uploaded.";

	  	 //update mo mukha mo
         $qry_img = "INSERT INTO slider (room_type, slider_image) VALUES (UPPER('$type'), 'images/sliders/" .$file_name. "')";
         $img_r = mysqli_query($db, $qry_img);
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'slider.php'}, delay);
		 </script>
		 <?php
      }
      else
      {
           $errorMsg = "Error adding slider.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'slider.php'}, delay);
		 </script>
		 <?php
      }

   }

	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE packages SET room_status = '0' WHERE package_id = ".$_GET['delete_id'];
		$results = mysqli_query($query);

		if($results)
		{
			$successMsg = "** Successfully deleted **";

			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'slider.php'}, delay);
			</script>
			<?php
		}

		else
		{
			$errorMsg = "** Error encountered **";
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'slider.php'}, delay);
			</script>
			<?php
		}
	}

?>

	<script type="text/javascript">

		function edit_id(package_id)
		{
				window.location.href='edit_packages.php?edit_id='+package_id;
		}

		function delete_id(package_id)
		{
			if(confirm('Sure to delete?'))
			{
				window.location.href='packages.php?delete_id='+package_id;
			}
		}
		
	</script>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_slider.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
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
															<i class="ace-icon fa fa-plus-square"></i> ADD SLIDER IMAGE
														</div>

														<form class="add-user" method="post" enctype="multipart/form-data">
															<fieldset>

																<label class="block clearfix label-user">TYPE
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="type" name="type"/>
																	<span class="login-error"><?php echo $firstnameError; ?></span>
																	</span>
																</label>

																
																<label class="block clearfix label-user">PHOTO
																	<span class="block input-icon input-icon-right">
																	<input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg , .gif">
																	<span class="login-error"><?php echo $emailaddressError; ?></span>
																	</span>
																</label>
																<div class="space"></div>

																<label class="block clearfix">
																	<button type="submit" class="btn btn-primary" id="btn-save" name="btn-save">
																	<i class="ace-icon login-icon fa fa-save"></i>
																	<span class="login-text"> SAVE</span>
																	</button>
																</label>

																<div class="space"></div>

															</fieldset>
														</form>
														
													</div>
												</div>

												<?php 

													$query = "SELECT * FROM slider";
													$results = mysqli_query($db,$query);
													$count = mysqli_num_rows($results);

												?>

												<div class="col-md-8">
													<div class="clearfix"></div>
														<div class="top widget-box">
															<div class="table-header">
																<i class="ace-icon fa fa-align-justify"></i> LIST OF IMAGES
																<i class="float-right"> Number of Images: <span class="badge badge-primary"><?php echo $count; ?></span></i>
															</div>

																<table id="dynamic-table" class="display table table-striped table-bordered">
																	<thead class="smaller-font">
																		<tr>
																			<th>ID</th>
																			<th>TYPE</th>
																			<th>PHOTO</th>
																		</tr>
																	</thead>

																	<tbody>

																	<?php

																		$query = "SELECT * FROM slider";
																		$result = mysqli_query($db,$query);

																			if(mysqli_num_rows($result) > 0)
																				{
																					while($row = mysqli_fetch_array($result))
																						{
																	?>

																		<tr class="smaller-font-1">
																			<td class="center"><?php echo $row['id']; ?></td>
																			<td class="center"><?php echo $row['room_type']; ?></td>
																			<td class="center"><?php echo $row['slider_image']; ?></td>
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


