<?php
	require('include/config.php');
	include('../conn.php');
	require(__DIR__.'/lib/PayPal-PHP-SDK/autoload.php');
	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;
	use PayPal\Api\Transaction;

	session_start();

	// check if user approves payment
	if (isset($_POST['success']) && $_POST['success'] == 'true') {
		$apiContext = new \PayPal\Rest\ApiContext(
	    new \PayPal\Auth\OAuthTokenCredential(
		        CLIENT,     // ClientID
		        SECRET      // ClientSecret
	    	)
		);
		
		// get the payment object
		$paymentId = $_POST['paymentID'];
    	$payment = Payment::get($paymentId, $apiContext);

    	// execute payment
    	$execution = new PaymentExecution();
    	$execution->setPayerId($_POST['payerID']);

    	$half = $_POST['half'];
    	$slice = 1;
    	if ($half === true)
    		$slice = 2;

    	try{
    		$result = $payment->execute($execution, $apiContext);

    		try {
	            $payment = Payment::get($paymentId, $apiContext);
	        } catch (Exception $ex) {
	        	echo $ex;
	        	exit(1);
	        }

    	}catch (Exception $ex){
    		echo $ex;
    		exit(1);
    	}

    	// update database
    	$ref = $_POST['ref'];
    	$sql = "UPDATE accounting SET `Acc_Payment` = `Acc_Balance` / $slice WHERE `Ref_No` = $ref";
    	$res = mysqli_query($db, $sql);
    	if (res){
    		echo $payment;
    		$_SESSION['booking_msg'] = "Booking Succesful";
    	}
    	else{
    		echo "SQL error";
    		exit(1);
    	}
	}
	// user cancelled the approval
	else{
		echo "Booking cancelled";
	}
?>