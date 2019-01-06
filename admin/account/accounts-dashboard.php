<?php include('header.php'); ?>


<?php

$scheduleError="";
$timeError="";
$personnelError="";	
// $passwordError="";

	ob_start();
	session_start();

	$error = false;


	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE housekeeping set code = 0 WHERE id = ".$_GET['delete_id'];
		$results = mysqli_query($db,$query);

		if($results)
		{
			$successMsg = "** Successfully deleted **";

			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'housekeeping.php'}, delay);
			</script>
			<?php
		}

		else
		{
			$errorMsg = "** Error encountered **";
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'housekeeping.php'}, delay);
			</script>
			<?php
		}
	}

?>

	<script type="text/javascript">

		function edit_id(id)
		{
				window.location.href='edit_housekeeping.php?edit_id='+id;
		}

		function delete_id(id)
		{
			if(confirm('Sure to delete?'))
			{
				window.location.href='housekeeping.php?delete_id='+id;
			}
		}
		
	</script>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar.php'); ?>
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
													</div>
												</div>

												<?php 

													$query = "SELECT * FROM accounts WHERE Code = '1'";
													$results = mysqli_query($db,$query);
													$count = mysqli_num_rows($results);

												?>

												<div class="col-md-10 col-md-offset-1">
													<div class="clearfix"></div>
														<div class="top widget-box">
															<div class="table-header">
																<i class="ace-icon fa fa-align-justify"></i> LIST OF ACCOUNTS
																<i class="float-right"> Number of Accounts: <span class="badge badge-primary"><?php echo $count; ?></span></i>
															</div>

																<table id="dynamic-table" class="display table table-striped table-bordered">
																	<thead class="smaller-font">
																		<tr>
																			<th>ACCOUNT ID</th>
																			<th>NAME</th>
																			<th>USERNAME</TH>
																			<th>ROLE</th>
																			<TH>DATE CREATED</TH>
																		</tr>
																	</thead>

																	<tbody>

																	<?php

																		$query = "SELECT * FROM accounts WHERE Code = '1'";
																		$result = mysqli_query($db,$query);

																			if(mysqli_num_rows($result) > 0)
																				{
																					while($row = mysqli_fetch_array($result))
																						{
																	?>

																		<tr class="smaller-font-1">
																			<td class="center"><?php echo $row['Acc_ID'] ?></td>
																			<td class="center"><?php echo $row['F_Name'].' '.$row['L_Name'] ?></td>
																			<td class="center"><?php echo $row['Username']; ?></td>
																			<td class="center"><?php echo $row['Role']; ?></td>
                                                                            <td class="center"><?php echo $row['date_created']; ?></td>
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


