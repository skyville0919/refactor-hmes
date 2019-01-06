<?php include('header.php'); ?>


<?php


	$Ref_No = $Acc_Name = $Contact_No = $Bed_ID = "";
	$debitTotal = $creditTotal = 0.00;

	if (isset($_POST['accounting'])) {

		$Ref_No = $_POST['Ref_No'];	
		$Acc_Name = $_POST['Acc_Name'];	
		$Contact_No = $_POST['Contact_No'];	

		$sql_transaction = "SELECT * FROM accounting WHERE Ref_No = '$Ref_No' ";
	  	$result_transaction = $db->query($sql_transaction);

		$sql_vat = "SELECT * FROM vat";
	  	$result_vat = $db->query($sql_vat);
	  	$row_vat =  $result_vat->fetch_assoc();

		$sql_amenities = "SELECT * FROM bed_res 
		INNER JOIN amenities ON amenities.Bed_ID = bed_res.Bed_ID 
		INNER JOIN inventory ON inventory.Item_ID = amenities.Item_ID 
		WHERE bed_res.Ref_No = '$Ref_No' ";
	  	$result_amenities = $db->query($sql_amenities);

	} else {
		header('Location: accounting.php');
	}

?>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar_accounting.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
								<div class="page-content">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">

												<div class="space-4"></div>


												<div class="col-md-4">
													<div class="widget-box">	
														<div class="widget-header widget-header-flat adding-header">
															<i class="ace-icon fa fa-plus-square"></i> ACCOUNT INFORMATION
														</div>

														<form class="add-user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
															<fieldset>

																<label class="block clearfix label-user">Reference Number
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="username" name="username" value="<?php echo "CRTH-2018-".$Ref_No; ?>" readonly />
																</label>

																<label class="block clearfix label-user">Customer Name
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_firstname" name="user_firstname" value="<?php echo $Acc_Name; ?>" readonly/>
																</label>

																<label class="block clearfix label-user">Contact Number
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?php echo $Contact_No; ?>" readonly/>
																	<p class="log">
																</label>

															

                                                                    <br/>


															</fieldset>
														</form>

							
														
													</div>


													
												</div>


												<div class="col-md-8">
													<div class="clearfix"></div>
														<div class="top widget-box">
															<div class="table-header">
																<i class="ace-icon fa fa-align-justify"></i> BILL SUMMARY
															</div>

																<table id="" class="display table table-striped table-bordered">
																	<thead class="smaller-font">
																		<tr>
																			<th>Date</th>
																			<th>Transaction No.</th>
																			<th>Description</th>
																	        <th>Debit</th>
																	        <th>Credit</th>
																	        <th>Balance</th>
																	        
																		</tr>
																	</thead>

																	<tbody>

																	<?php while($row_transaction = $result_transaction->fetch_assoc()): ?>

					          										<tr>
					          											<td><?php echo $row_transaction['Acc_Date_Avail']; ?></td>
					          											<td><?php echo date("Ymd", strtotime($row_transaction['Acc_Date_Avail'])) . $row_transaction['TR_Acc']; ?></td>
					            										<td><?php echo $row_transaction['Acc_Type']; ?></td>
															            <td>₱ <?php echo $row_transaction['Acc_Payment']; $debitTotal += $row_transaction['Acc_Payment']; ?></td>
															            <td>₱ <?php echo $row_transaction['Acc_Balance']; $creditTotal += $row_transaction['Acc_Balance']; ?></td>
															            <td>₱ <?php echo abs($row_transaction['Acc_Payment'] - $row_transaction['Acc_Balance']); ?></td>
					          										</tr>

																	<?php if($row_transaction['Acc_Type'] == 'Amenities'){ ?>
																		<?php while($row_amenities = $result_amenities->fetch_assoc()): ?>
					          										<tr>
					          											<td></td>
					          											<td></td>
					            										<td>- <?php echo $row_amenities['Name']; ?></td>
															            <td>₱ <?php echo !(abs($row_transaction['Acc_Payment'] - $row_transaction['Acc_Balance'])) ? $row_amenities['Price'] * $row_amenities['Item_Quant'] : 0.00 ?> </td>
															            <td>₱ <?php echo $row_amenities['Price'] * $row_amenities['Item_Quant']; ?></td>
															            <td></td>
					          										</tr>

					        										<?php endwhile; } endwhile; ?>

														          	<tr>
					          											<td></td>
					          											<td></td>
					            										<td>AMOUNT DUE:</td>
															            <td></td>
															            <td></td>
															            <td>₱ <?php echo abs($debitTotal - $creditTotal); ?></td>
					          										</tr>

														          	<tr>
					          											<td></td>
					          											<td></td>
					            										<td>VATABLE SALES:</td>
															            <td></td>
															            <td></td>
															            <td>₱ <?php echo abs($debitTotal - $creditTotal) - (abs($debitTotal - $creditTotal) * ($row_vat['Vat']/100)); ?></td>
					          										</tr>

														          	<tr>
					          											<td></td>
					          											<td></td>
					            										<td>VAT(<?php echo $row_vat['Vat']; ?>%):</td>
															            <td></td>
															            <td></td>
															            <td>₱ <?php echo abs(($debitTotal - $creditTotal)*($row_vat['Vat']/100)); ?></td>
					          										</tr>

					          										<tr class="text-primary">
					          											<td></td>
					          											<td></td>
					            										<td>TOTAL:</td>
															            <td></td>
															            <td></td>
															            <td>₱ <?php echo abs($debitTotal - $creditTotal); ?></td>
					          										</tr>


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


