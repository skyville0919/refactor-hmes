
 
<!-- Modal -->
<div class="modal fade" id="summary-facility" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
           $query = "SELECT * FROM facility";
           $result = mysqli_query($db,$query);
           $row = mysqli_fetch_array($result);
      ?>
        <h5 class="custm-title" id="">FACILITY</h5>
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
                        <div class="col-md-2">
                            <label class="label2">Facility:</label>
                        </div>
                        <div class="col-md-10">
                            <p class="label2" id="facility"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="label2">Attendees:</label>
                        </div>
                        <div class="col-md-9">
                            <p class="label2" id="attend"></p>
                        </div>
                    </div>
                </div>
            </div>

            

            

            <br/>


            <div class="row ml-2">
                <div class="col-md-3">
                    <label class="label2">Date from:</label>
                </div>
                <div class="col-md-3">
                    <p class="label2" id="dates1"></p>
                </div>

                 <div class="col-md-2">
                    <label class="label2">To:</label>
                </div>
                <div class="col-md-4">
                    <p class="label2" id="dates2"></p>
                </div>
            </div>

             <div class="row ml-2">
                <div class="col-md-3">
                    <label class="label2">Time from:</label>
                </div>
                <div class="col-md-3">
                    <p class="label2" id="times1"></p>
                </div>

                 <div class="col-md-2">
                    <label class="label2">To:</label>
                </div>
                <div class="col-md-4">
                    <p class="label2" id="times2"></p>
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


      <div class="modal-footer" id="footersss">
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#facility-modal">Back</button>
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#facility-payment">Proceed to Payment</button>
      </div>
    </div>
  </div>
x</div>


