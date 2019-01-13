
<?php include('sidebar-header.php') ?>

<?php


	$error = false;

	if(isset($_POST['btn-cancel']))
	{
        ?>
            <script>
                window.location.href='dashboard2.php';
            </script>
        <?php
	}


   if( isset($_FILES['image']) )
   {

      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_temp = explode('.',$_FILES['image']['name']);
      $file_ext = end($file_temp);
      
      $expensions= array("jpeg","jpg","png","gif","JPG");
      
      if( in_array($file_ext,$expensions) == false)
      {
	  
		 ?>
		 <script>
		 alert("Extension not allowed.");
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'upload_picture.php'}, delay);
		 </script>
		 <?php
      }
      
      else if($file_size > 2097152)
      {
	  	 $errorMsg = "File size must be exatcly 2MB.";
		 ?>
		 <script>
		 alert("File must be exactly 2MB.");
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'upload_picture.php'}, delay);
		 </script>
		 <?php
      }
      
      else if( !$error )
      {
         move_uploaded_file($file_tmp,'images/avatars/'.$file_name);

	  	 //update mo mukha mo
         $qry_img = "UPDATE accounts SET Icon = 'images/avatars/$file_name' WHERE Acc_ID =" .$_SESSION['accounts'];
         $img_r = mysqli_query($db,$qry_img);
		 ?>
		 <script>
		 alert("Image successfully uplaoded!");
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'dashboard2.php'}, delay);
		 </script>
		 <?php
      }
      else
      {

		 ?>
		 <script>
		 alert("Error uploading image.");
		 var delay = 1500;
		 setTimeout(function(){ window.location = 'upload_picture.php'}, delay);
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
                            <i class="ace-icon fa fa-users lock-icon"></i>
                                <label>USER DETAILS</label>
						</div>
						
                    <form enctype="multipart/form-data" method="post">										
						<?php 
							$query = "SELECT * FROM accounts WHERE Acc_ID=".$_SESSION['accounts'];
							$result = mysqli_query($db,$query);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result)) {
						?>
                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="<?php echo $row['F_Name'] ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="<?php echo$row['L_Name']?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
									<input type="text" class="form-control" value="<?php echo$row['Email']?>" disabled>
                                </div>
                            </div>
						</div>
						
						<div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
									<input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg , .gif">	
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
						<?php
							}
						}
						?>
                    </form>
                    </div>
                </div>
            </div>
		</div>


<?php include('sidebar-footer.php') ?>
