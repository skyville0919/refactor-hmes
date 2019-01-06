<?php include ('header.php'); ?>

<?php
	ob_start();
    session_start();
    
    $scheduleError="";
    $timeError="";
	$personnelError="";
	$taskError="";
	$actionError ="";
	$areaError ="";


	if( isset($_GET['edit_id']))
	{
		$query = "SELECT * FROM housekeeping WHERE housekeeping_id=".$_GET['edit_id'];
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);
	}

	$error = false;

	if ( isset($_POST['btn-update']))
	{
		// $schedule = ($_POST['schedule']);
		// $schdule = strip_tags($schedule);
		// $schdule = htmlspecialchars($schedule);
		
		$task = $_POST['task'];

		$personnel = ($_POST['personnel']);
		// $personnel = strip_tags($personnel);
		// $personnel = htmlspecialchars($personnel);

		$area = $_POST['area'];

		$action = $_POST['action'];

		$time = $_POST['time'];

		if (!$error)
		{
			$queries = "UPDATE housekeeping SET date = NOW(), time = '$time', task = '$task', personnel_assigned = '$personnel', area = '$area', action = '$action' WHERE housekeeping_id =".$_GET['edit_id'];
			$result = mysqli_query($db, $queries);

				if($result)
				{
					$successMsg = "Edited successfully.";
					?>
					<script>
						var delay = 3000;
						setTimeout(function(){ window.location = 'housekeeping-housekeeping.php'}, delay);
					</script>
					<?php
				}
				else
				{
					$errorMsg = "Error encountered";
					?>
					<script>
						var delay = 5000;
						setTimeout(function(){ window.location = 'housekeeping-housekeeping.php'}, delay);
					</script>
					<?php
				}
		}

	}

	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE housekeeping SET code = '0' WHERE id = ".$_GET['delete_id'];
		$results = mysqli_query($query);

		if($results)
		{
			$successMsg = "** Successfully deleted **";

			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'housekeeping-housekeeping.php'}, delay);
			</script>
			<?php
		}

		else
		{
			$errorMsg = "** Error encountered **";
			echo $row['action'];
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'housekeeping-housekeeping.php'}, delay);
			</script>
			<?php
		}
	}

		
	if(isset($_POST['btn-cancel']))
	{
		header("Location: housekeeping-housekeeping.php");
	}


?>

	<script type="text/javascript">

		function edit_id(housekeeping_id)
		{
				window.location.href='edit_housekeeping.php?edit_id='+housekeeping_id;
		}

		function delete_id(housekeeping_id)
		{
			if(confirm('Sure to delete?'))
			{
				window.location.href='housekeeping-housekeeping.php?delete_id='+housekeeping_id;
			}
		}
		
	</script>

	<body class="no-skin">
	<script src="jquery-1.12.0.min.js" type="text/javascript"></script>
		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_housekeeping-housekeeping.php'); ?>
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
																	<i class="ace-icon fa fa-plus-square"></i> EDIT SCHEDULE
																</div>

														<form class="add-user" method="post">
															<fieldset>

																<label class="block clearfix label-user">TIME
																	<span class="block input-icon input-icon-right">
																	<input type="time" class="form-control" id="time" name="time" min="0:00" max="24:00" value="<?php echo $row['time']; ?>"/>
																	<span class="login-error"><?php echo $timeError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">TASK
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="task" name="task" value="<?php echo $row['task']; ?>"/>
																	<span class="login-error"><?php echo $taskError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">PERSONNEL
																	<span class="block input-icon input-icon-right">
																	<select  class="form-control" id="personnel" name="personnel">
																	<option value="<?php echo $row['personnel_assigned'] ?>"><?php echo $row['personnel_assigned'] ?></option>
																	<?php 
																		$quer = "SELECT * FROM emp_accounts WHERE Role = 'housekeeper' AND Code = '1'";
																		$results = mysqli_query($db, $quer);
																		$option = '';
																		while($rows = mysqli_fetch_assoc($results)) {
																			$option .= '<option value="'.$rows['Name'].'">'.$rows['Name'].'</option>'; 
																		}
																	?>
																	<?php echo $option; ?>
																	</select>
																	<span class="login-error"><?php echo $personnelError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">AREA
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="area" name="area" value="<?php echo $row['area']; ?>"/>
																	<span class="login-error"><?php echo $areaError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">ACTION
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="action" name="action" value="<?php echo $row['action']; ?>"/>
																	<span class="login-error"><?php echo $actionError; ?></span>
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

													</div>
												</div>

												<?php 

													$query = "SELECT * FROM housekeeping WHERE code = '1'";
													$results = mysqli_query($db,$query);
													$count = mysqli_num_rows($results);

												?>

												<div class="col-md-8">
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
																			<!-- <th>SCHEDULE</th> -->
																			<th>TIME</th>
																			<th>TASK</th>
																			<TH>PERSONNEL</TH>
																			<th>AREA</th>
																			<th>ACTION</th>
																			
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
																			<td class=""><?php echo $row['housekeeping_id']; ?></td>
																			<!-- <td><?php echo $row['schedule'] ?></td> -->
																			<td><?php echo $row['time']; ?></td>
																			<td><?php echo $row['task']; ?></td>
																			<td><?php echo $row['personnel_assigned']; ?></td>
																			<td><?php echo $row['area']; ?></td>
																			<td class="center">
																			<?php 
																				if($row['action'] == "Immediate") {
																			?> <span class="badge badge-xs badge-danger" disabled><?php echo "IMMEDIATE"; ?></span>
																				<?php } else if ($row['action'] == "Set") {
																				?> <span class="badge badge-md badge-primary" disabled><?php echo "SET"; ?></span></td> <?php } ?>

																			<!-- <td class="center">
																				<a href="javascript:edit_id('<?php echo $row['housekeeping_id']; ?>')" class="btn btn-xs btn-success bt-btn"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i>Edit</a>

																				<a href="javascript:delete_id('<?php echo $row['housekeeping_id']; ?>')" class="btn btn-xs btn-danger bt-btn"><i class="ace-icon fa fa-trash bigger-120"></i>Remove</a>
																				
																			</td> -->
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