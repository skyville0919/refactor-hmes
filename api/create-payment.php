<?php
	
	require('include/config.php');
	include('../conn.php');
	require(__DIR__.'/lib/PayPal-PHP-SDK/autoload.php');
	use PayPal\Api\Item;
	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\ItemList;
	use PayPal\Api\Payer;
	use PayPal\Api\Payment;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Transaction;
	session_start();

	// create new api context
	$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
	        CLIENT,     // ClientID
	        SECRET      // ClientSecret
    	)
	);

	// create payment
	$payer = new \PayPal\Api\Payer();
	$payer->setPaymentMethod('paypal');

	// item lists (must total the same with amount)
	$ref = $_POST['ref'];
	$sql = "SELECT * FROM accounting WHERE Ref_No = $ref";
	$res = mysqli_query($db, $sql);

	$items = array();
	$total = 0;
	while ($row = mysqli_fetch_assoc($res)){
		$item = new Item();
		$item->setName($row['Acc_Type'])
			->setCurrency('PHP')
		    ->setQuantity(1)
		    ->setPrice($row['Acc_Balance']);

	    array_push($items, $item);
	    $total = $total + $row['Acc_Balance'];
	}
	$itemList = new ItemList();
	$itemList->setItems($items);

	$amount = new Amount();
	$amount->setCurrency("PHP")
	    ->setTotal($total);
	/*$item1 = new Item();
	$item1->setName('Ground Coffee 40 oz')
	    ->setCurrency('PHP')
	    ->setQuantity(1)
	    ->setSku("123123") // Similar to `item_number` in Classic API
	    ->setPrice(7.5);
	$item2 = new Item();
	$item2->setName('Granola bars')
	    ->setCurrency('PHP')
	    ->setQuantity(1)
	    ->setSku("321321") // Similar to `item_number` in Classic API
	    ->setPrice(2);

    $itemList = new ItemList();
	$itemList->setItems(array($item1, $item2));

	$amount = new Amount();
	$amount->setCurrency("PHP")
	    ->setTotal(9.5);*/

    $transaction = new Transaction();
	$transaction->setAmount($amount)
	    ->setItemList($itemList)
	    ->setDescription("Payment description")
	    ->setInvoiceNumber(uniqid());

    
    // url to redirect the user when user cancels payment
    $redirectUrls = new \PayPal\Api\RedirectUrls();
    $redirectUrls->setReturnUrl("https://www.facebook.com")
    ->setCancelUrl("https://www.facebook.com");

    $payment = new Payment();
	$payment->setIntent("sale")
	    ->setPayer($payer)
	    ->setRedirectUrls($redirectUrls)
	    ->setTransactions(array($transaction));

    try {
	    $payment->create($apiContext);
	    header('Content-Type: application/json');
	    echo $payment;
	    
	    //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
	}
	catch (\PayPal\Exception\PayPalConnectionException $ex) {
	    // This will print the detailed information on the exception.
	    //REALLY HELPFUL FOR DEBUGGING
	    echo $ex->getData();
	}
?>