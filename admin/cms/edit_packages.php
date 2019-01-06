<?php include ('header.php'); ?>

<?php

$firstnameError="";
$lastnameError="";
$emailaddressError="";
	ob_start();
	session_start();

	if( isset($_GET['edit_id']))
	{
		$query = "SELECT * FROM contanct_info WHERE id=".$_GET['edit_id'];
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);
	}

	$error = false;

	if( isset($_POST['btn-save']) )
   {


  	  $type = trim($_POST['type']);
	  $type = strip_tags($type);
      $type = htmlspecialchars($type);	

	  $quantity = trim($_POST['quantity']);
	  $quantity = strip_tags($quantity);
	  $quantity = htmlspecialchars($quantity);	

	  $quantityy = trim($_POST['quantityy']);
	  $quantityy = strip_tags($quantityy);
	  $quantityy = htmlspecialchars($quantityy);	

	  if ( empty($type))
	  {
		  $error = true;
		  $firstnameError = "** Enter type **";
	  }

	  if ( empty($quantity))
	  {
		  $error = true;
		  $lastnameError = "** Enter quantity **";
	  }
      
      else if( !$error )
      {
        

	  	 //update mo mukha mo
         $qry_img = "UPDATE contanct_info SET facebook = '$type', twitter = '$quantity', instagram = '$quantityy'  WHERE id = ".$_GET['edit_id'];
         $img_r = mysqli_query($db, $qry_img);
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'cms.php'}, delay);
		 </script>
		 <?php
      }
      else
      {
	  	 $errorMsg = "Error editing package.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'cm.php'}, delay);
		 </script>
		 <?php
      }

   }

	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE packages SET room_status = '0' WHERE package_id = ".$_GET['delete_id'];
		$results = mysql_queryi($query);

		if($results)
		{
			$successMsg = "** Successfully deleted **";

			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'packages.php'}, delay);
			</script>
			<?php
		}

		else
		{
			$errorMsg = "** Error encountered **";
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'packages.php'}, delay);
			</script>
			<?php
		}
	}

		
	if(isset($_POST['btn-cancel']))
	{
		header("Location: cms.php");
	}


?>

	<script type="text/javascript">

		function edit_id(id)
		{
				window.location.href='edit_packages.php?edit_id='+id;
		}

		function delete_id(id)
		{
			if(confirm('Sure to delete?'))
			{
				window.location.href='packages.php?delete_id='+id;
			}
		}
		
	</script>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_edit_packages.php'); ?>
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
															<i class="ace-icon fa fa-plus-square"></i> EDIT SM ACCOUNTS
														</div>

														<form class="add-user" method="post" enctype="multipart/form-data">
															<fieldset>

																<label class="block clearfix label-user">FACEBOOK
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="type" name="type" value="<?php echo $row['facebook'] ?>"/>
																	<span class="login-error"><?php echo $firstnameError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">TWITTER
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $row['twitter'] ?>" required/>
																	<span class="login-error"><?php echo $lastnameError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">INSTAGRAM
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="quantityy" name="quantityy" value="<?php echo $row['instagram'] ?>" required/>
																	<span class="login-error"><?php echo $lastnameError; ?></span>
																	</span>
																</label>

															

																<div class="space"></div>

																<label class="block clearfix">
																	<button type="submit" class="btn btn-primary" id="btn-save" name="btn-save">
																	<i class="ace-icon login-icon fa fa-save"></i>
																	<span class="login-text"> SAVE</span>
																	</button>

																	<button type="submit" class="btn btn-danger" id="btn-cancel" name="btn-cancel">
																	<i class="ace-icon login-icon fa fa-save"></i>
																	<span class="login-text">CANCEL</span>
																	</button>
																</label>
																
																<div class="space"></div>

															</fieldset>
														</form>
														
													</div>
												</div>

												<?php 

$query = "SELECT * FROM contanct_info";
$results = mysqli_query($db,$query);
$count = mysqli_num_rows($results);

?>

<div class="col-md-8">
<div class="clearfix"></div>
	<div class="top widget-box">
		<div class="table-header">
			<i class="ace-icon fa fa-align-justify"></i> LIST OF SM ACCUNTS
			<i class="float-right"> Number of Accounts: <span class="badge badge-primary"><?php echo $count; ?></span></i>
		</div>

			<table id="dynamic-table" class="display table table-striped table-bordered">
				<thead class="smaller-font">
					<tr>
						<th>ID</th>
						<TH>FACEBOOK</TH>
						<th>TWITTER</th>
						<th>INSTAGRAM</th>
					</tr>
				</thead>

				<tbody>

				<?php

					$query = "SELECT * FROM contanct_info";
					$result = mysqli_query($db,$query);

						if(mysqli_num_rows($result) > 0)
							{
								while($row = mysqli_fetch_array($result))
									{
				?>

					<tr class="smaller-font-1">
						<td class="center"><?php echo $row['id'] ?></td>
						<td class="center"><?php echo $row['facebook'] ?></td>
						<td class="center"><?php echo $row['twitter']; ?></td>
						<td class="center"><?php echo $row['instagram']; ?></td>
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


