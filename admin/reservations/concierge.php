<?php include ('header.php'); ?>

<?php

$itemError = "";
$nameError = "";
$qtyError = "";
$priceError = "";
$brandError = "";

	ob_start();
	session_start();

	$error = false;

	if ( isset($_POST['btn-save']))
	{
		$item = trim($_POST['item-name']);
		$item = strip_tags($item);
		$item = htmlspecialchars($item);	

		$quantity = trim($_POST['quantity']);
		$quantity = strip_tags($quantity);
		$quantity = htmlspecialchars($quantity);	

		$price = trim($_POST['price']);
		$price = strip_tags($price);
		$price = htmlspecialchars($price);


        $brand = trim($_POST['brand']);
        $brand = strip_tags($brand);
        $brand = htmlspecialchars($brand);


		if ( empty($item))
		{
			$error = true;
			$itemError = "** Enter item name **";
		}

		if ( empty($quantity))
		{
			$error = true;
			$qtyError = "** Enter item quantity **";
		}


		if ( empty($price))
		{
			$error = true;
			$priceError = "** Enter item price **";
		}

		if ( empty($brand))
		{
			$error = true;
			$brandError = "** Enter item brand **";
		}


		if (!$error)
		{
			$results;
			$q1 = "SELECT `Item_ID` from inventory WHERE Name = '$item' AND Brand = '$brand' AND Price = $price";
			$res = mysqli_query($db, $q1);
			if (mysqli_num_rows($res) > 0){
				// update
				$update = "UPDATE inventory SET Quantity = Quantity + $quantity WHERE Name = '$item'";
				$results = mysqli_query($db, $update);
			}
			else{
				$query = "INSERT INTO inventory (Name, Quantity, Price, Brand) VALUES (UPPER('$item'), '$quantity', '$price', UPPER('$brand'))";
				$results = mysqli_query($db,$query);
			}
            
				if($results)
				{

					$successMsg = "Added successfully.";
					?>
					<script>
						var delay = 3000;
						setTimeout(function(){ window.location = 'inventory-items.php'}, delay);
					</script>
					<?php
				}
				else
				{

					$errorMsg = "Error encountered";
					?>
					<script>
						var delay = 5000;
						setTimeout(function(){ window.location = 'inventory-items.php'}, delay);
					</script>
					<?php
				}
		}

	}

	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE accounts SET Code = '0' WHERE Acc_ID = ".$_GET['delete_id'];
		$results = mysqli_query($db,$query);

		if($results)
		{
			$successMsg = "** Successfully deleted **";

			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location ='accounts-accounts.php'}, delay);
			</script>
			<?php
		}

		else
		{
			$errorMsg = "** Error encountered **";
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'accounts-accounts.php'}, delay);
			</script>
			<?php
		}
	}

?>

	<script type="text/javascript">

		function edit_id(Req_ID)
		{
				window.location.href='con_req.php?edit_id='+Req_ID;
		}

		function delete_id(Acc_ID)
		{
			if(confirm('Sure to delete?'))
			{
				window.location.href='accounts-accounts.php?delete_id='+Acc_ID;
			}
		}
		
	</script>

	<body class="no-skin">

		<?php include ('navbar.php'); ?>
			<div class="main-container" id="main-container">
				<?php include ('sidebar-concierge.php'); ?>
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
			<?php include('conModal.php'); ?>
			
		<?php include ('script.php'); ?>

	</body>

<?php ob_end_flush(); ?>


