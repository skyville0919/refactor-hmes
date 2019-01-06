<?php
	
	require_once 'connection.php';

	ob_start();

	session_start();

	$userid = $_SESSION['accounts'];

	session_destroy();

	$sql = "UPDATE logs SET userlog_logout = NOW() WHERE userlog_userid = '$userid' ORDER BY userlog_id DESC LIMIT 1";
	$results = mysqli_query($db,$sql);

	unset($userid);

	header("Location: index.php");
	
	exit;

	ob_end_flush();
?>