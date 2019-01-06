<?php 
    include('conn.php');
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
<div class="modal fade" id="restaurant-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="custm-title" id="">RESTAURANT RESERVATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <form method="POST" id="details-form3">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="custm-input-label" for="firstname">Firstname<span class="asterisk">*</span>
                                <input type="text" class="form-control custm-input" name="firstname" id="firstname" required></input>
                            </label>
                        </div>
                    
                        <div class="col-md-6">
                            <label class="custm-input-label" for="lastname">Lastname<span class="asterisk">*</span>
                                <input type="text" class="form-control custm-input" name="lastname" id="lastname" required></input>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

           <div class="row mt-2">
                <div class="col-md-12">
                    <h4 class="header2">RESTAURANT</h4>
                </div>
           </div>

           <div class="row">
                <div class="col-md-12">
                    <?php 
                        $query = "SELECT * FROM restaurant";
                        $result = mysqli_query($db, $query);
                        while($row=mysqli_fetch_array($result))
                            ?> 
                               <select name="res_type" id="res_type" class="custm-input form-control">
                                <option value="">SELECT RESTAURANT</option>
                                <option value="ITALIAN STEAKHOUSE">ITALIAN STEAKHOUSE</option>
                               </select>
                            <?php
                    ?>
                </div>
           </div>

           <div class="row mt-2">
                <div class="col-md-12">
                    <label class="custm-input-label" for="attendees">Number of Seats
                        <input type="number" name="seats" id="seats" class="custm-input form-control"></input>
                    </label>
                </div>
           </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="custm-input-label" for="event">Date<span class="asterisk">*</span>
                        <input type="date" class="form-control custm-input" name="date" id="date" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>" required></input>
                    </label>
                </div>

                <div class="col-md-6">
                        <label class="custm-input-label" for="time">Time<span class="asterisk">*</span>
                            <input type="time" name="time" id="time" class="form-control custm-input" value="<?php echo date('H:i') ?>" required></input>
                        </label>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="remarsks" class="custm-input-label">Special Requests
                        <textarea class="custm-input custm-textarea col-md-12" name="remarks3" id="remarks3"></textarea>
                    </label>
                </div>
            </div>

        </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#summary-restaurant" onclick="getRestaurant();">Next</button>
      </div>
    </div>
  </div>
</div>

<?php include('summaryRestaurant.php') ?>
<?php include('restaurantPayment.php') ?>
<?php include('tncModal3.php') ?>    
<?php include('pnpModal3.php') ?> 




 


