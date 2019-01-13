<?php include('sidebar-header.php'); ?>

<?php
	ob_start();

	$oldpass_Error="";
    $repwd_Error = "";
	$error = false;

	if(isset($_POST['btn-cancel']))
	{
        ?>
            <script>
                window.location.href='dashboard2.php';
            </script>
        <?php
	}

	if(isset($_POST['btn-save']))
	{

      $old_password = $_POST['old_password'];
      $new_password = $_POST['new_password'];
	  $re_password = $_POST['re_password'];
	  
	  $query =  "SELECT * FROM accounts WHERE Acc_ID=" .$_SESSION['accounts'];
      $check_pwd = mysqli_query($db, $query);
      $check_pass = mysqli_fetch_array($check_pwd);

      $change_pwd = $check_pass['Password'];
      $verify_pwd = password_verify($old_password, $change_pwd);
      
    
      

      if ($verify_pwd == '1') {
    
      	if ($new_password == $re_password && $new_password != $old_password)
      	{
            $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);
            $update_query = "UPDATE accounts SET Password = '$hashedPassword' WHERE Acc_ID =" .$_SESSION['accounts'];
            $update_qry = mysqli_query($db,$update_query);

		
			?>
			<script>
                alert("Password successfully changed!");
				var delay = 2000;
				setTimeout(function(){ window.location = 'logout.php'}, delay);
			</script>
			<?php
      	}
      	else
      	{
			?>
			<script>
                alert("Please check your inputs.")
				var delay = 1000;
				setTimeout(function(){ window.location = 'change_password.php'}, delay);
			</script>
			<?php
      	}
      }
      else
      {
			?>
			<script>
                alert("Please check your inputs.")
				var delay = 1000;
				setTimeout(function(){ window.location = 'change_password.php'}, delay);
			</script>
			<?php
      }
    }
      

?>
        <div class="d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="col-md-12 custm-change-body">
                        <div class="d-flex justify-content-left change-label mt-2">
                            <i class="ace-icon fa fa-lock lock-icon"></i>
                                <label>CHANGE PASSWORD</label>
                        </div>
                    <form action="" method="post">
                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="new_password" placeholder="New Password" title="Password must contain atleast one uppercase letter, one lowercase letter and a number, and atleast 8 characters." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="re_password" title="Password must contain atleast one uppercase letter, one lowercase letter and a number, and atleast 8 characters." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3 mb-3">
                            <div class="d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" name="btn-save">UPDATE</button>
                                    </div>

                                    <div class="col-md-4 ml-4">
                                        <button class="btn btn-danger" name="btn-cancel">CANCEL</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
        
		<?php include('sidebar-footer.php'); ?>


