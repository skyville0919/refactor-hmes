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

		<?php include ('../navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_housekeeping.php'); ?>
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

													$query = "SELECT * FROM housekeeping WHERE code = '1'";
													$results = mysqli_query($db,$query);
													$count = mysqli_num_rows($results);

												?>

												<div class="col-md-10 col-md-offset-1">
													<div class="clearfix"></div>
														<div class="top widget-box">
															<div class="table-header">
																<i class="ace-icon fa fa-align-justify"></i> LIST OF SCHEDULE
																<i class="float-right"> Number of Schedule: <span class="badge badge-primary"><?php echo $count; ?></span></i>
															</div>

																<table id="dynamic-table" class="display table table-striped table-bordered">
																	<thead class="smaller-font">
																		<tr>
																			<th>ID</th>
																			<th>SCHEDULE</th>
																			<th>TASK</TH>
																			<th>TIME</th>
																			<TH>PERSONNEL</TH>
																			<th></th>
																		</tr>
																	</thead>

																	<tbody>

																	<?php

																		$query = "SELECT * FROM housekeeping WHERE code = '1'";
																		$result = mysqli_query($db,$query);

																			if(mysqli_num_rows($result) > 0)
																				{
																					while($row = mysqli_fetch_array($result))
																						{
																	?>

																		<tr class="smaller-font-1">
																			<td class="center"><?php echo $row['id']; ?></td>
																			<td><?php echo $row['shecule'] ?></td>
																			<td><?php echo $row['task'] ?></td>
																			<td><?php echo $row['time_schedule']; ?></td>
																			<td><?php echo $row['personnel_assigned']; ?></td>
																			<td class="center">
																				<a href="javascript:edit_id('<?php echo $row['id']; ?>')" class="btn btn-xs btn-success bt-btn"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i>Edit</a>

																				<a href="javascript:delete_id('<?php echo $row['id']; ?>')" class="btn btn-xs btn-danger bt-btn"><i class="ace-icon fa fa-trash bigger-120"></i>Delete</a>
																				
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
			
		<?php include ('../script.php'); ?>

	</body>

<?php ob_end_flush(); ?>


