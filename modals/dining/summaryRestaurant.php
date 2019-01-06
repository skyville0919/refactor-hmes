
 
<!-- Modal -->
<div class="modal fade" id="summary-restaurant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
           $query = "SELECT * FROM bedroom WHERE Bed_Type = 'STUDIO-ROOM'";
           $result = mysqli_query($db,$query);
           $row = mysqli_fetch_array($result);
      ?>
        <h5 class="custm-title" id="">RESTAURANT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <label class="header2">RESERVATION SUMMARY</label>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="label2">Name:</label>
                        </div>
                        <div class="col-md-10">
                            <p class="label2" id="name"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="label2">Restaurant:</label>
                        </div>
                        <div class="col-md-9">
                            <p class="label2" id="restaurant"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="label2">Seats:</label>
                        </div>
                        <div class="col-md-10">
                            <p class="label2" id="seats2"></p>
                        </div>
                    </div>
                </div>
            </div>

            

            

            <br/>


            <div class="row ml-2">
                <div class="col-md-2">
                    <label class="label2">Date:</label>
                </div>
                <div class="col-md-4">
                    <p class="label2" id="date2"></p>
                </div>

                 <div class="col-md-3">
                    <label class="label2">Time:</label>
                </div>
                <div class="col-md-3">
                    <p class="label2" id="time2"></p>
                </div>
            </div>

            

            <br/>

            <div class="row ml-2">
                <div class="col-md-5">
                    <label for="" class="header3">Special Request:</label>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-12">
                    <p class="label2" id="spec2"></p>
                </div>
            </div>

        </div>


      <div class="modal-footer" id="footer">
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#restaurant-modal">Back</button>
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#restaurant-payment">Proceed to Payment</button>
      </div>
    </div>
  </div>
x</div>


