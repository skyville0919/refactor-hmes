<?php
	include('conn.php');
	if (!isset($_GET['ref'])){
		/*header('HTTP/1.0 403 Forbidden');

		echo 'You are forbidden!';*/
		header('location: '.dirname($_SERVER["PHP_SELF"]).'/');
		return;
	}

	$ref = $_GET['ref'];
	$ishalf = $_GET['hall'];

	// get bedroom reservation
	$q1 = "SELECT * FROM `accounting` WHERE `Ref_No` = $ref ORDER BY `TR_Acc` ASC LIMIT 1";
	$res = mysqli_query($db, $q1);
	$bed_res = mysqli_fetch_assoc($res);

	// get add-ons
	$q2 = "SELECT * FROM `add_ons` WHERE `Ref_No` = $ref";
	$res2 = mysqli_query($db, $q2);
	$addons = mysqli_fetch_all($res2, MYSQLI_ASSOC);

	// get total amount
	$q3 = "SELECT SUM(Acc_Balance) AS amt FROM accounting WHERE Ref_No = $ref";
	$res3 = mysqli_query($db, $q3);
	$total_charge = mysqli_fetch_assoc($res3)['amt'];

	$slice = 1;
	if ($ishalf == true)
		$slice = 2;

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
<title>CORINTHIANS HOTEL</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/checkoutstyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- script for close -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.vlcone').fadeOut('slow', function(c){
			$('.vlcone').remove();
		});
	});	  
});
var urlParams = new URLSearchParams(window.location.search);
var ref = urlParams.get('ref');
</script>

<!-- //script for close -->
</head>
<body>

<div class="main">
	<h1>CORINTHIANS HOTEL</h1>
	
	<div class="hotel-right  vlcone" style="height: 737px;">
		<div class="alert-close"> </div>
		<div class="hotel-form">
			<h3>Charges</h3>
			<ul class="list_ins1">
						<li>Room Charges</li>

						<?php foreach($addons as $addon): ?>
						    <li><?= $addon['Add_Description'] ?></li>
					    <?php endforeach; ?>

					    <li>Total</li>

			</ul>
			<ul class="list_ins2">
						<li>: <?= $bed_res['Acc_Balance']/$ishalf?></li>

						<?php foreach($addons as $addon): ?>
						    <li>: <?= $addon['Add_Amount'] / $ishalf ?></li>
					    <?php endforeach; ?>

					    <li>: &#8369;<?= $total_charge / $ishalf ?></li>
						
			</ul>
			<div class="clear"></div>
		</div>
		<div class="pay-form">
			<center><div id="paypal-button" style="margin: 0 auto;" data-half="<?= $ishalf?>"></div></center>
			
		</div>
	</div>
	<div class="hotel-left">
		<div class="hotel-text">
			<h2>ROYAL PALACE</h2>
			<h3> $250.00 / <span>night</span></h3>
			<p>Entire Room for 5 members.</p>
			<p>Thursday, Dec 10, 2014 to Thursday, Dec 12, 2014.</p>
		</div>
	</div>
	<div class="clear"></div>
	<p class="footer">&copy; 2015 Hotel Checkout Form. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a></p>
</div>
<script>
  paypal.Button.render({
    env: 'sandbox', // Or 'production'
    // Set up the payment:
    // 1. Add a payment callback
    payment: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('api/create-payment.php',{
      	ref: ref,
      	half: false
      })
        .then(function(res) {
        	console.log(res.data);
          // 3. Return res.id from the response
          //console.log(JSON.stringify(res));
          return res.id;
        });
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function(data, actions) {
    	console.log(data);
      // 2. Make a request to your server (this is executed after the user clicks Accept in the payment)
      return actions.request.post('api/execute-payment.php', {
        paymentID: data.paymentID,
        payerID:   data.payerID,
        ref: ref,
        success: 'true',
        half: false
      })
        .then(function(res) {
          //console.log(JSON.stringify(res));
          // 3. Show the buyer a confirmation message./
          
          // redirect
          window.location.href = 'dashboard.php';
        });
    }
  }, '#paypal-button');
</script>
</body>
</html>