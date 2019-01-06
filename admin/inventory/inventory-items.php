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

		$critical = trim($_POST['critical']);
		$critical = strip_tags($critical);
		$critical = htmlspecialchars($critical);

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
				$query = "INSERT INTO inventory (Name, Quantity, Critical, Price, Brand) VALUES (UPPER('$item'), '$quantity', '$critical', '$price', UPPER('$brand'))";
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

		function edit_id(Acc_ID)
		{
				window.location.href='edit_accounts.php?edit_id='+Acc_ID;
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
				<?php include ('sidebar-items.php'); ?>
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
															<i class="ace-icon fa fa-plus-square"></i> ADD ITEMS
														</div>

														<form class="add-user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
															<fieldset>

																<label class="block clearfix label-user">NAME
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="item-name" name="item-name"/>
																	<span class="login-error"><?php echo $itemError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">QTY
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="quantity" name="quantity"/>
																	<span class="login-error"><?php echo $qtyError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">CRITICAL VALUE
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" id="critical" name="critical"/>
																	<span class="login-error"><?php echo $qtyError; ?></span>
																	</span>
																</label>

																<label class="block clearfix label-user">PRICE
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" name="price" id="price" required>
																	<span class="login-error"><?php echo $priceError; ?></span>
																	</span>
																</label>

                                                                <label class="block clearfix label-user">BRAND
																	<span class="block input-icon input-icon-right">
																	<input type="text" class="form-control" name="brand" id="brand" required>
																	<span class="login-error"><?php echo $brandError; ?></span>
																	</span>
																</label>

																<div class="space"></div>

																<label class="block clearfix">
																	<button type="submit" class="btn btn-primary" id="btn-save" name="btn-save">
																	<i class="ace-icon login-icon fa fa-save"></i>
																	<span class="login-text"> SAVE</span>
																	</button>
																</label>

																<div class="space"></div>

															</fieldset>
														</form>
														
													</div>
												</div>

												<?php 

													$query = "SELECT * FROM inventory";
													$results = mysqli_query($db,$query);
													$count = mysqli_num_rows($results);

												?>

												<div class="col-md-8">
													<div class="clearfix"></div>
														<div class="top widget-box">
															<div class="table-header">
																<i class="ace-icon fa fa-align-justify"></i> LIST OF ITEMS
																<i class="float-right"> Number of Items: <span class="badge badge-primary"><?php echo $count; ?></span></i>
															</div>

																<table id="dynamic-table" class="display table table-striped table-bordered">
																	<thead class="smaller-font">
																		<tr>
																			<th>ITEM ID</th>
																			<th>NAME</th>
																			<th>QUANTITY</th>
																			<th>PRICE</th>
																			<th>BRAND</th>
																			<th></th>
																		</tr>
																	</thead>

																	<tbody>

																	<?php

																		$query = "SELECT * FROM inventory";
																		$result = mysqli_query($db,$query);

																			if(mysqli_num_rows($result) > 0)
																				{
																					while($row = mysqli_fetch_array($result))
																						{
																	?>

																		<tr class="smaller-font-1">
																			<td class="center"><?php echo $row['Item_ID']; ?></td>
																			<td class="center"><?php echo $row['Name']; ?></td>
																			<td class="center"><?php echo $row['Quantity']; ?></td>
                                                                            <td class="center"><?php echo $row['Price']; ?></td>
                                                                            <td class="center"><?php echo $row['Brand']; ?></td>
																			<td class="center">
																				<a href="javascript:edit_id('<?php echo $row['package_id']; ?>')" class="btn btn-xs btn-success bt-btn"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i>Edit</a>

																				<a href="javascript:delete_id('<?php echo $row['package_id']; ?>')" class="btn btn-xs btn-danger bt-btn"><i class="ace-icon fa fa-trash bigger-120"></i>FULL</a>
																				
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


