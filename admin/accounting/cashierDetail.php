<?php include('header.php'); ?>


<?php
	ob_start();

	$Ref_No = $paymentError = "";
	$debitTotal = $creditTotal = $payment = $change = 0.00;
	$id = array(); 

	if (isset($_POST['cashier'])) {

		$Ref_No = $_POST['Ref_No'];	
		$payment = isset($_POST['payment']) ? $_POST['payment'] : 0;
		$id = isset($_POST['id']) ? $_POST['id'] : [];
		$checked = isset($_POST['checked']) ? $_POST['checked'] : [];
		
		
		array_sum($checked);
		
		$sql_vat = "SELECT * FROM vat";
	  	$result_vat = $db->query($sql_vat);
	  	$row_vat =  $result_vat->fetch_assoc();
	  	$vat = $row_vat['Vat'];

		if($payment){
			if(count($checked)){
				if(is_numeric($payment)){
					if($payment < array_sum($checked)){
						$paymentError = "Insufficient payment";
					} else {
						$change = $payment - array_sum($checked);
						for ($i = 0; $i < count($id); $i++) {
							$date = date("Y-m-d");
							$sql_update_account = "UPDATE accounting SET Acc_Payment = Acc_Payment + '$checked[$i]', Acc_Date_Paid = '$date'  WHERE TR_Acc = '$id[$i]' ";
							echo $sql_update_account;
							$result_update_account = $db->query($sql_update_account);
							$sql_insert_reciept = "INSERT INTO reciept_log(TR_Acc, Reciept_Date, Reciept_Payment, Reciept_Vat, Reciept_Change) VALUES('$id[$i]', '$date', '$checked[$i]', '$vat', '$change')";
							$result_insert_reciept = $db->query($sql_insert_reciept);

						}
					}			
				} else {
					$paymentError = "Invalid input";
				}
			} else {
				$paymentError = "You must check atleast one";
			}
		}


		$sql_transaction = "SELECT * FROM accounting WHERE Ref_No = '$Ref_No' ";
	  	$result_transaction = $db->query($sql_transaction);
		

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
				<?php include ('sidebar_cashier.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
								<div class="page-content">
									<form action="cashierDetail.php" method="post">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">

												<div class="space-4"></div>


												<div class="col-md-4">
													<div class="widget-box">	
														<div class="widget-header widget-header-flat adding-header">
															<i class="ace-icon fa fa-plus-square"></i> PAYMENT
														</div>

														<div class="add-user">
															<fieldset>

																<label class="block clearfix label-user">Payment
																	<span class="block input-icon input-icon-right">
																	<input type="hidden" name="Ref_No" value="<?php echo $Ref_No; ?>">
																	<input type="text" class="form-control" name="payment" value="<?php echo $payment; ?>"/>
																	<p class="text-danger"><?php echo $paymentError; ?></p>
																</label>


																<label class="block clearfix label-user">Change
																	<span class="block input-icon input-icon-right">
																	<input type="hidden" name="Ref_No" value="<?php echo $Ref_No; ?>">
																	<input type="text" class="form-control" name="change" value="<?php echo $change; ?>"><br>
																	<input type="submit" class="form-control btn btn-success" name="cashier">
																</label>

                                                                    <br/>


															</fieldset>
														</div>

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
																			<th></th>
																			<th>Date</th>
																			<th>Reference No.</th>
																			<th>Description</th>
																	        <th>Debit</th>
																	        <th>Credit</th>
																	        <th>Balance</th>
																	        
																		</tr>
																	</thead>

																	<tbody>

																	<?php while($row_transaction = $result_transaction->fetch_assoc()): ?>

					          										<tr>
					          											<td>
					          												<?php $num = 0; if(abs($row_transaction['Acc_Payment'] - $row_transaction['Acc_Balance'])){ ?>
					          													<input type="checkbox" id="id<?php echo $row_transaction['TR_Acc']; ?>" name="id[]" value="<?php echo $row_transaction['TR_Acc']; ?>">
					          													<input type="checkbox" style="display: none" id="checked<?php echo $row_transaction['TR_Acc']; ?>" name="checked[]" value="<?php echo abs($row_transaction['Acc_Payment'] - $row_transaction['Acc_Balance']); ?>">
					          													<?php echo "<p class='label label-danger'>Pending</p>"; ?>
					          													<script type="text/javascript">
																					var check<?php echo $row_transaction['TR_Acc']; ?> = $("#id<?php echo $row_transaction['TR_Acc']; ?>");
																					var chk<?php echo $row_transaction['TR_Acc']; ?> = $("#checked<?php echo $row_transaction['TR_Acc']; ?>");
																					check<?php echo $row_transaction['TR_Acc']; ?>.on('change', function(){
																				    	chk<?php echo $row_transaction['TR_Acc']; ?>.prop('checked', this.checked);
																					});
																				</script>

					          												<?php } else echo "<p class='label label-info'>Settled</p>"; ?>
					          											</td>
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
					          											<td></td>
					            										<td>AMOUNT DUE:</td>
															            <td></td>
															            <td></td>
															            <td>₱ <?php echo abs($debitTotal - $creditTotal); ?></td>
					          										</tr>

														          	<tr>
					          											<td></td>
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
					          											<td></td>
					            										<td>VAT(<?php echo $row_vat['Vat']; ?>%):</td>
															            <td></td>
															            <td></td>
															            <td>₱ <?php echo abs(($debitTotal - $creditTotal)*($row_vat['Vat']/100)); ?></td>
					          										</tr>

					          										<tr class="text-primary">
					          											<td></td>
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
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php include ('script.php'); ?>

	</body>

<?php ob_end_flush(); ?>


