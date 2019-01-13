<?php include ('header.php'); ?>

<?php
$scheduleError="";
$timeError="";
$personnelError="";	
$areaerror="";
$actionError = "";
$taskError = "";
	ob_start();
	session_start();

	if( isset($_GET['edit_id']))
	{
		$query = "SELECT * FROM concierge_request WHERE Req_ID=".$_GET['edit_id'];
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);
	}

	$error = false;

	if( isset($_POST['btn-save']) )
   {

    $ref = $_POST['task'];

    $personnel = ($_POST['personnel']);
    // $personnel = strip_tags($personnel);
    // $personnel = htmlspecialchars($personnel);

    $desc = $_POST['area'];

    $qty = $_POST['action'];

    $date = $_POST['time'];

    $price = $_POST['price'];

    if (!$error)
    {


        $queries = "INSERT INTO accepted_con (Ref_No, Date, Description, Quantity, Price, Personnel_Assigned) VALUES('$ref', '$date', '$desc', '$qty', '$price','$personnel')";
        $result = mysqli_query($db, $queries);
        echo $queries;

        $pre_query5 = " SELECT * FROM add_ons_price WHERE add_on_name= 'concierge'";
        $pre_result5 = mysqli_query($db, $pre_query5);

        if (mysqli_num_rows($pre_result5) > 0 ) {
            while ($pre_row5 = mysqli_fetch_assoc($pre_result5)) {
                $add_price = $pre_row5['add_on_price'];
            
                $query4 = "INSERT INTO add_ons (Ref_No,Add_Description,Add_Amount,Add_Quantity,Add_Date) VALUES ('$ref','concierge','$add_price','1',NOW())";
                $result_query4 = mysqli_query($db, $query4);

                $query5 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref','sample, sample', NOW(), '$arrival','add-ons-$desc', '$price'+'$add_price', 0, '1')";
                $result_query5 = mysqli_query($db, $query5);
                echo $query5;

            }
        }

            if($result)
            {
                $successMsg = "Edited successfully.";
                ?>
                <script>
                    var delay = 3000;
                    setTimeout(function(){ window.location = 'concierge.php'}, delay);
                </script>
                <?php
            }
            else
            {
                $errorMsg = "Error encountered";
                ?>
                <script>
                    var delay = 5000;
                    setTimeout(function(){ window.location = 'concierge.php'}, delay);
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
		header("Location: packages.php");
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
				<?php include ('sidebar_edit_packages.php'); ?>
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
															<i class="ace-icon fa fa-plus-square"></i> Create Concierge Request
														</div>

														<form class="add-user" method="post">
															<fieldset>

                                                            <label class="block clearfix label-user"> Ref_No
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="task" name="task" value="<?php echo $row['Ref_No']; ?>"/>
																	<span class="login-error"><?php echo $taskError; ?></span>
																	</span>
																</label>


																<label class="block clearfix label-user">Req_Date
																	<span class="block input-icon input-icon-right">
																	<input type="date" class="form-control" id="time" name="time" min="0:00" max="24:00" value="<?php echo $row['Req_Date']; ?>"/>
																	<span class="login-error"><?php echo $timeError; ?></span>
																	</span>
																</label>

																

																<label class="block clearfix label-user">Description
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="area" name="area" value="<?php echo $row['TR_Desc']; ?>"/>
																	<span class="login-error"><?php echo $areaerror; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">QTY
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="action" name="action" value="<?php echo $row['TR_Qty']; ?>"/>
																	<span class="login-error"><?php echo $actionError; ?></span>
																	</span>
																</label>

                                                                <label class="block clearfix label-user">Total Price
																	<span class="block input-icon input-icon-right">
																	<input type="number" class="form-control" id="action" name="price" required/>
																	<span class="login-error"><?php echo $actionError; ?></span>
																	</span>
																</label>

                                                                <label class="block clearfix label-user">Personnel Assigned
																	<span class="block input-icon input-icon-right">
																	<select class="form-control" id="personnel" name="personnel">
																	<option value="">Select Personnel</option>
																	<?php 
																		$query1 = "SELECT Username FROM emp_accounts WHERE Role = 'concierge' AND Code = '1'";
																		$result1 = mysqli_query($db,$query1);
																		$option ='';
                                
                                   										 while($row = mysqli_fetch_assoc($result1)) {
                                        									$option .= '<option value="'.$row['Username'].'">'.$row['Username'].'</option>';
                                   										} 
                                									?>
                                									<?php echo $option; ?>
																	</select>
																	<span class="login-error"><?php echo $personnelError; ?></span>
																	</span>
																</label>

																<br/>

																<label class="block clearfix">
																	<button type="submit" class="btn btn-primary" id="btn-update" name="btn-save">
																	<i class="ace-icon login-icon fa fa-save"></i>
																	<span class="login-text">CREATE</span>
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
                                                    $req_date = date('Y-m-d');

													$query = "SELECT * FROM concierge_request WHERE Archived = '1'";
													$results = mysqli_query($db,$query);
													$count = mysqli_num_rows($results);

												?>

												<div class="col-md-8">
													<div class="clearfix"></div>
														<div class="top widget-box">
															<div class="table-header">
																<i class="ace-icon fa fa-align-justify"></i> LIST OF REQUEST
																<i class="float-right"> Number of REQUEST: <span class="badge badge-primary"><?php echo $count; ?></span></i>
															</div>

																<table id="dynamic-table" class="display table table-striped table-bordered">
																	<thead class="smaller-font">
																		<tr>
																			<th>Reference No.</th>
																			<th>Description</th>
																			<th>QUANTITY</th>
																			<th>Request Date</th>
																			<th></th>
																		</tr>
																	</thead>

																	<tbody>

																	<?php
                                                                        $req_date = date('Y-m-d');
																		$query = "SELECT * FROM concierge_request WHERE Archived = '1'";
																		$result = mysqli_query($db,$query);

																			if(mysqli_num_rows($result) > 0)
																				{
																					while($row = mysqli_fetch_array($result))
																						{
																	?>

																		<tr class="smaller-font-1">
																			<td class="center"><?php echo $row['Ref_No']; ?></td>
																			<td class="center"><?php echo $row['TR_Desc']; ?></td>
																			<td class="center"><?php echo $row['TR_Qty']; ?></td>
                                                                            <td class="center"><?php echo $row['Req_Date']; ?></td>
                                                                            <!-- <td class="center"><?php echo $row['Brand']; ?></td> -->
																			<td class="center">
																				<a class="btn btn-xs btn-success bt-btn" href="javascript:edit_id('<?php echo $row['Req_ID'] ?>')"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i>Create</a>

																				<a href="javascript:delete_id('<?php echo $row['package_id']; ?>')" class="btn btn-xs btn-danger bt-btn"><i class="ace-icon fa fa-trash bigger-120"></i>CANCEL</a>
																				
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


