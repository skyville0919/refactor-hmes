<?php
	
	require_once '../connection.php';


	ob_start();

	session_start();

	$userid = $_SESSION['admin_accounts'];

	session_destroy();

	$sql = "UPDATE admin_log SET logout = NOW() WHERE Acc_ID = '$userid' ORDER BY log_id DESC LIMIT 1";
	$results = mysqli_query($db,$sql);

	unset($userid);

	header("Location: ../index.php");
	
	exit;

	ob_end_flush();
?>