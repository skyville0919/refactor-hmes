<?php 
    include('conn.php');
?>

<?php 
    if(isset($_SESSION['accounts']) != "") {
        $islogin = "<button type='button' class='btn btn-primary' data-toggle='modal' data-dismiss='modal' data-target='#reserve-modal-economy' onclick='test()'>BOOK NOW</button>";
    } else {
        $islogin = $islogin = "<a href='login/'><button type='button' class='btn btn-primary'>LOG IN TO RESERVE A ROOM</button></a>";
    }
?>


    <style>
        .carousel-inner > .carousel-item > img {
            max-width: 100%;
            display: block;
            height: 40%;
            line-height: 1;
        }
    </style>

  


<!-- Modal -->
<div class="modal fade custm-modal" id="economy-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header custm-header">
        <h5 class="custm-title" id="">ECONOMY-SINGLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body custm-body">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/sky-studio.jpg" alt="Los Angeles" width="1100" height="500">
                </div>
                    <?php 
                        $query = "SELECT * FROM slider WHERE room_type = 'ECONOMY-SINGLE'";
                        $result = mysqli_query($db,$query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="carousel-item"> 
                                        <img src ="<?php echo $row['slider_image']?>"  alt="slide-image">
                                    </div>
                                <?php   
                                                                    
                            }
                        }
                    ?>      
            </div>
  
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        

        <?php 
			$query2 = " SELECT * FROM bedroom WHERE Bed_Type = 'STUDIO-ROOM'";
			$result2 = mysqli_query($db, $query2);
				if (mysqli_num_rows($result2) > 0) {
					while ($row2 = mysqli_fetch_array($result2)) {
                        ?> 
                        <br/>
                            <label class="custm-description mt-2"> <?php echo$row2['Bed_Description'] ?></label>
                            <br/>
                            <br/>
                                <label class="custm-description">Price: PHP <?php echo $row2['Bed_Price']; ?></label>
                                <br/>
								<label class="custm-description">Room(s) Left: <?php echo $row2['Bed_Available']; ?></label>
						<?php
					}
				}
		?>
      </div>

      <div class="modal-footer custm-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo $islogin ?>
      </div>
    </div>
  </div>
</div>

<?php include('reserve-modal.php') ?>

<?php include('summaryModal.php') ?> 
<?php include('paymentModal.php') ?> 


<?php include('tncmodal.php') ?>    
<?php include('pnpmodal.php') ?> 