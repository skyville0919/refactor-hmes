<?php include ('header.php'); ?>


	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar-housekeeping-userlog.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
							<!-- <?php include ('breadcrumb_userlog.php'); ?> -->
								<div class="page-content">
									<div class="row">
										<div class="col-xs-12">
											<div class="clearfix"></div>
												
												<div class="space"></div>
												

												<?php 
													$query = "SELECT * FROM emp_log";
													$result = mysqli_query($db,$query);
													$count = mysqli_num_rows($result);

												?>

												<div class="widget-box">
													<div class="table-header">
														<i class="ace-icon fa fa-align-justify"></i> USER LOGS
														<i class="float-right"> Number of Logs: <span class="badge badge-primary"><?php echo $count; ?></span></i>
													</div>

												
													<table id="dynamic-table" class="display table table-striped table-bordered">
														<thead class="smaller-font">
															<tr>
																<th>EMPLOYEE ID</th>
																<th>NAME</th>
																<th>LOGIN</th>
                                                                <th>ACTION</th>
																<th>LOGOUT</th>
															</tr>
														</thead>

														<tbody>

															<?php

																$sql = "SELECT * FROM emp_log";
																$results = mysqli_query($db,$sql);

																	if(mysqli_num_rows($results) > 0)
																		{
																			while($row = mysqli_fetch_array($results))
																				{
															?>

															<tr class="smaller-font-1">
																<td class="center"><?php echo $row['userlog_id']; ?></td>
																<td><?php echo $row['userlog_name']; ?></td>
																<td><?php echo $row['userlog_login']; ?></td>
																<td><?php echo $row['userlog_logout']; ?></td>
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
				
				<?php include ('footer_index.php'); ?>

				<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
					<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
				</a>

			</div>

		<?php include ('script.php'); ?>

	</body>
