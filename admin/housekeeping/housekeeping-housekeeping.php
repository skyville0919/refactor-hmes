<?php include('header.php'); ?>


<?php

$scheduleError="";
$timeError="";
$personnelError="";	
$areaerror="";
$actionError = "";
$taskError = "";
// $passwordError="";

	// ob_start();
	// session_start();

	$error = false;

	if ( isset($_POST['btn-save']))
	{
		$schedule = ($_POST['schedule']);
		// $schdule = strip_tags($schedule);
		// $schdule = htmlspecialchars($schedule);
		
		$task = ($_POST['task']);



		$personnel = ($_POST['personnel']);
		// $personnel = strip_tags($personnel);
		// $personnel = htmlspecialchars($personnel);

		$area = ($_POST['area']);
		$action = ($_POST['action']);
		$time = ($_POST['time']);



		// if ( empty($schedule))
		// {
		// 	$error = true;
		// 	$firstnameError = "** Enter your first name **";
		// }

		// if ( empty($lastname))
		// {
		// 	$error = true;
		// 	$lastnameError = "** Enter your last name **";
		// }


		// if ( empty($emailaddress))
		// {
		// 	$error = true;
		// 	$emailaddressError = "** Enter your email address **";
		// }

		// if ( empty($userpass))
		// {
		// 	$error = true;
		// 	$passwordError = "** Enter your password **";
		// }

		// if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) !== false)
		// {
	 	// 	$error = true;
	 	// 	$emailaddressError = "** Enter a valid email address **";
		// }

		if (!$error)
		{
			$query = "INSERT INTO housekeeping (date, time, task, personnel_assigned, area, action, code) VALUES(NOW(),'$time','$task', '$personnel', '$area', UPPER('$action'), '1')";
			$results = mysqli_query($db,$query);
				if($results)
				{

					$successMsg = "Schedule added successfully.";
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
						var delay = 3000;
						setTimeout(function(){ window.location = 'housekeeping-housekeeping.php'}, delay);
					</script>
					<?php
				}
		}

	}

	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE housekeeping SET Code = '0' WHERE housekeeping_id = ".$_GET['delete_id'];
		$results = mysqli_query($db,$query);

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
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'housekeeping-housekeeping.php'}, delay);
			</script>
			<?php
		}
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
															<i class="ace-icon fa fa-plus-square"></i> ADD SCHEDULE
														</div>

														<form class="add-user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
															<fieldset>

																<!-- <label class="block clearfix label-user">Schedule
																	<span class="block input-icon input-icon-right">
																	<?php 
																		$query = "SELECT * FROM housekeeping_schedule";
																		$result = mysqli_query($db, $query);
																	?>
																	<select class="form-control" id="schedule" name="schedule">
																	<option value=''>Schedule</option>
																		<?php
																		
																			while($row = mysqli_fetch_assoc($result)) {
																			$scheduleid = $row['id'];
																			$schedule = $row['schedule'];

																			echo "<option value='".$scheduleid."'>".$schedule."</option>";
                                   											} 
																		?>
																		<script>
																	$(document).ready(function(){
																		$("#schedule").change(function() {
																		var schedid = $(this).val();
																		$.ajax ({
																			type: 'post',
																			url: 'ajaxData.php',
																			data: {schedule:schedid},
																			dataType: 'json',
																			success: function(response) {
																				var len = response.length;
																				$("#tasks").empty();
																				for(var i = 0; i < len; i++) {
																					var id = response[i]['id'];
																					var name = response[i]['task'];
																					$("#tasks").append("<option value='"+name+"'>"+name+"</option>");
																				}
																			}
																		});
																	});
																});
																</script>
																	</select> -->
																	<!-- <span class="login-error"><?php echo $scheduleError; ?></span>
																	</span>
																</label>



																<label class="block clearfix label-user">Task
																	<span class="block input-icon input-icon-right">
																	<select class="form-control" id="tasks" name="tasks">
																	<option value=''>Task</option>
																	</select>
																	<span class="login-error"><?php echo $personnelError; ?></span>
																	</span>
																</label> -->


																<label class="block clearfix label-user">Time
																	<span class="block input-icon input-icon-right">
																	<input type="time" class="form-control" id="time" name="time" min="0:00" max="24:00"/>
																	<span class="login-error"><?php echo $timeError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Task
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="task" name="task" required/>
																	<span class="login-error"><?php echo $taskError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Personnel Assigned
																	<span class="block input-icon input-icon-right">
																	<select class="form-control" id="personnel" name="personnel">
																	<option value="">Select Personnel</option>
																	<?php 
																		$query = "SELECT Username FROM emp_accounts WHERE Role = 'housekeeper' AND Code = '1'";
																		$result = mysqli_query($db,$query);
																		$option ='';
                                
                                   										 while($row = mysqli_fetch_assoc($result)) {
                                        									$option .= '<option value="'.$row['Username'].'">'.$row['Username'].'</option>';
                                   										} 
                                									?>
                                									<?php echo $option; ?>
																	</select>
																	<span class="login-error"><?php echo $personnelError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Area
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="area" name="area" required/>
																	<span class="login-error"><?php $areaerror; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">Action
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="action" name="action" required/>
																	<span class="login-error"><?php echo $actionError; ?></span>
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
																			<td class=""><?php echo $row['housekeeping_id']; ?></td>
																			<!-- <td><?php echo $row['schedule'] ?></td> -->
																			<td class="center"><?php echo $row['time']; ?></td>
																			<td class="center"><?php echo $row['task']; ?></td>
																			<td class="center"><?php echo $row['personnel_assigned']; ?></td>
																			<td class="center"><?php echo $row['area']; ?></td>
																			<td class="center">
																			<?php 
																				if($row['action'] == "IMMEDIATE") {
																			?> <span class="badge badge-xs badge-danger" disabled><?php echo "IMMEDIATE"; ?></span>
																				<?php } else if ($row['action'] == "SET") {
																				?> <span class="badge badge-md badge-primary" disabled><?php echo "SET"; ?></span></td> <?php } ?>

																			<td class="center">
																				<a href="javascript:edit_id('<?php echo $row['housekeeping_id']; ?>')" class="btn btn-xs btn-success bt-btn"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i>Edit</a>

																				<a href="javascript:delete_id('<?php echo $row['housekeeping_id']; ?>')" class="btn btn-xs btn-danger bt-btn"><i class="ace-icon fa fa-trash bigger-120"></i>Remove</a>
																				
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


