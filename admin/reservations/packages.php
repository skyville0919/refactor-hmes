<?php include ('header.php'); ?>

<?php


$sql = "SELECT accounts.Acc_ID, accounts.F_name AS Acc_Fname, accounts.L_name AS Acc_Lname, accounts.M_name AS Acc_Mname, customer.Ref_No, customer.F_Name, customer.L_name, customer.M_name, customer.Contact_No, customer.Address FROM accounts 
          INNER JOIN customer ON customer.Acc_Id = accounts.Acc_Id
  ;";
  $result1 = $db->query($sql);


$firstnameError="";
$lastnameError="";
$emailaddressError="";
	ob_start();
	session_start();

	$error = false;

   if( isset($_FILES['image']) )
   {

      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_temp = explode('.',$_FILES['image']['name']);
      $file_ext = end($file_temp);
      
      $expensions= array("jpeg","jpg","png","gif","JPG");

  	  $type = trim($_POST['type']);
	  $type = strip_tags($type);
      $type = htmlspecialchars($type);	

	  $quantity = trim($_POST['quantity']);
	  $quantity = strip_tags($quantity);
	  $quantity = htmlspecialchars($quantity);	

	  if ( empty($type))
	  {
		  $error = true;
		  $firstnameError = "** Enter type **";
	  }

	  if ( empty($quantity))
	  {
		  $error = true;
		  $lastnameError = "** Enter quantity **";
	  }
      
      if( in_array($file_ext,$expensions) == false)
      {
	  	 $errorMsg = "Extension not allowed, please choose a JPEG or PNG file.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'packages.php'}, delay);
		 </script>
		 <?php
      }
      
      else if($file_size > 2097152)
      {
	  	 $errorMsg = "File size must be exatcly 2MB.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'packages.php'}, delay);
		 </script>
		 <?php
      }
      
      else if( !$error )
      {
         move_uploaded_file($file_tmp,'../../home/images/packages/'.$file_name);
	  	 $successMsg = "Image successfully uploaded.";

	  	 //update mo mukha mo
         $qry_img = "INSERT INTO packages (type, quantity, package_photo, room_status) VALUES (UPPER('$type'), UPPER('$quantity'), 'images/packages/" .$file_name. "', '1')";
         $img_r = mysqli_query($db, $qry_img);
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'packages.php'}, delay);
		 </script>
		 <?php
      }
      else
      {
	  	 $errorMsg = "Error adding package.";
		 ?>
		 <script>
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'packages.php'}, delay);
		 </script>
		 <?php
      }

   }

	if ( isset($_GET['delete_id']))
	{
		$query = "UPDATE packages SET room_status = '0' WHERE package_id = ".$_GET['delete_id'];
		$results = mysqli_query($query);

		if($results)
		{
			$successMsg = "** Successfully deleted **";

			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'packages.php'}, delay);
			</script>
			<?php
		}

		else
		{
			$errorMsg = "** Error encountered **";
			?>
			<script>
				var delay = 1500;
				setTimeout(function(){ window.location = 'packages.php'}, delay);
			</script>
			<?php
		}
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
				<?php include ('sidebar_packages.php'); ?>
					<div class="main-content">
						<div class="main-content-inner">
								<div class="page-content">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">

												<div class="space-4"></div>

												

												 <?php 

$query = "SELECT * FROM customer WHERE Archived = '1'";
$results = mysqli_query($db,$query);
$count = mysqli_num_rows($results);
$date = date('Ymd');

?>

<div class="col-md">
<div class="clearfix"></div>
  <div class="top widget-box">
	<div class="table-header">
	  <i class="ace-icon fa fa-align-justify"></i> LIST OF TRANSACTIONS
	  <i class="float-right"> Number of Accounts: <span class="badge badge-primary"><?php echo $count; ?></span></i>
	</div>

	  <table id="dynamic-table" class="display table table-striped table-bordered">
		<thead class="smaller-font">
		  <tr>
			<th>Reference no.</th>
			<th>Reserved to</th>
			<th>Reserved by</th>
			<th></th>
		  </tr>
		</thead>
		<tbody>

		<?php while($row = $result1->fetch_assoc()): ?>

		  <tr class="smaller-font-1">
		   <td><?php echo "CRTH-".$date."-".$row['Ref_No']; ?></td>
		   <td><?php echo $row['L_name'] . ", " . $row['F_Name'] . " " . $row['M_name']; ?></td>
		   <td><?php echo $row['Acc_Lname'] . ", " . $row['Acc_Fname'] . " " . $row['Acc_Mname']; ?></td>
		   <td 
		  </tr>
				  
		<?php endwhile; ?>

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


