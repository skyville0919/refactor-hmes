<?php

	ob_start();
	session_start();


	if ( !isset($_SESSION['accounts']))
	{
		header("Location: index.php");
		exit();
	}

	$query = "SELECT * FROM accounts WHERE Acc_ID =".$_SESSION['accounts'];
	$result = mysqli_query($db,$query);
	$userrow = mysqli_fetch_array($result);

?>

<script type="text/javascript">

	function upload_picture(id)
	{
		window.location.href='upload_picture.php?upload_picture='+id;
	}

	function change_password(id)
	{
		window.location.href='change_password.php?change_password='+id;
	}
		
</script>

<div id="navbar" class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="home.php" class="navbar-brand">
				<small>
					<!-- <img src="../images/logo/logo.png" class="navbar-icon" /> -->
					HMES
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?php echo $userrow['Icon'] ; ?>" />
						<span class="user-info">
							<small>Welcome,</small><?php echo $userrow['F_Name']; ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="javascript:upload_picture('<?php echo $userrow['Acc_ID']; ?>')">
								<i class="ace-icon fa fa-camera"></i> Upload Photo
							</a>
						</li>

						<li>
							<a href="javascript:change_password('<?php echo $userrow['Acc_ID']; ?>')">
								<i class="ace-icon fa fa-lock"></i> Change Password
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="logout.php">
								<i class="ace-icon fa fa-sign-out"></i> Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>
