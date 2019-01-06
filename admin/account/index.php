<?php include('header.php') ?>



<?php
	ob_start();
    session_start();
    
    //DECLARATION OF VARIABLES
    $emailaddressError = "";
    $passwordError = "";
    
    $error = false;

 

    if (isset($_POST['btn-login'])) {

        $username = trim($_POST['Username']);
        $username= strip_tags($username);
        $username = htmlspecialchars($username);

        $userpass = trim($_POST['Password']);
        $userpass = strip_tags($userpass);
        $userpass = htmlspecialchars($userpass);




        // $emailaddress = filter_var($emailaddress, FILTER_SANITIZE_EMAIL);

        // if(isset($_SESSION['accounts']['Code']) == "0") {
        //     $error=true;
        //     $passwordError = "wadasdasdasd";
        // }
     
        if (empty($username)) {
            $error = true;
            $emailaddressError = " **Enter your username.**";
        }
        
        if (empty($userpass)) {
            $error = true;
            $passwordError = " **Enter your password.**";
        }

        // // if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL) !== false)
		// {
	 	// 	$error = true;
	 	// 	$emailaddressError = "** Enter a valid username **";
        // }


        if (!$error) {
            $upass = hash('sha256', $userpass);

            $query = "SELECT * FROM admin_accounts where Username = '$username' AND Code = '1'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);

            if ($count == 1 && $row['Password'] == $userpass) {
                $_SESSION['admin_accounts'] = $row['Acc_ID'];

                $query = "INSERT INTO admin_log(Acc_ID, account_name, login) VALUES('".$_SESSION['admin_accounts']."', '".$row['F_Name']." ".$row['L_Name']."', NOW())";
                $resu = mysqli_query($db, $query);
                    if ($row['Role'] == "ACCOUNT-ADMIN") {
                        header("Location: account/accounts-dashboard.php");
                    } 
                    else if ($row['Role'] == "HOUSEKEEPING-ADMIN") {
                        header("Location: housekeeping/housekeeping-dashboard.php");
                    }
                    else if ($row['Role'] == "RESERVATION-ADMIN") {
                        header("Location: reservations/reservation-dashboard.php");
                    }
                    else if ($row['Role'] == "INVENTORY-ADMIN") {
                        header("Location: inventory/inventory-dashboard.php");
                    }
                    else if ($row['Role'] == "ACCOUNTING-ADMIN") {
                        header("Location: accounting/accounting.php");
                    }
            } else {
                $errorMsg = "Incorrect Credentials. Try Again.";
                ?>
                <script>
                    var delay = 1500;
                    setTimeout(function{
                        window.location = 'index.php'
                        },delay
                    ) 
                </script>
                <?php
            }
        }
    }

?>

<body class="login-layout light-login">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="space-6"></div>
                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box border">
                                    <div class="widget-body border">
                                        <div class="widget-main border">
                                            <h4 class="login-header">
                                                <i class="ace-icon fa fa-lock"></i> LOG-IN
                                            </h4>
                                            <div class="space-6"></div>

                                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" autocomplete="off" method="post">
                                                <fieldset>
                                                    <?php 
                                                        if (isset($errorMsg)) {
                                                            ?>
                                                                <div class="form-group">
                                                                    <div class="login-alert-error fa fa-exclamataion-triangle">
                                                                        <?php echo $errorMsg ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>

                                                    <label class="block clear-fix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" placeholder="Username" id="Username" name="Username"/>
														        <i class="ace-icon fa fa-envelope"></i>
														            <span class="login-error"><?php echo $emailaddressError; ?></span>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
														    <input type="password" class="form-control" placeholder="Password" id="Password" name="Password"/>
														        <i class="ace-icon fa fa-key"></i>
														            <span class="login-error"><?php echo $passwordError; ?></span>
														                <span class="forgot-password"><a href="forgot_password.php" data-target="#forgot-password">Forgot Password?</a></span>
														</span>
													</label>

                                                    <label class="block clearfix">
														    <button type="submit" class="btn-sandz" id="btn-login" name="btn-login">
														        <i class="ace-icon login-icon fa fa-sign-in"></i>
														            <span class="login-text"> Sign In</span>
														    </button>
													</label>
                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <?php include ('footer.php'); ?>
        </div>
    </div>
    <?php include ('script.php'); ?>
</body>

<?php ob_end_flush(); ?>