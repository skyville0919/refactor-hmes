
<!-- Modal -->
<div class="modal fade" id="summary-modal-economy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
           $query = "SELECT * FROM bedroom WHERE Bed_Type = 'ECONOMY-SINGLE'";
           $result = mysqli_query($db,$query);
           $row = mysqli_fetch_array($result);
      ?>
        <h5 class="custm-title" id=""><?php echo$row['Bed_Type'] ?></h5>
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
                            <p class="label2" id="name-economy"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-2">
                    <label class="label2">Arrival:</label>
                </div>
                <div class="col-md-4">
                    <p class="label2" id="arr-economy"></p>
                </div>

                 <div class="col-md-3">
                    <label class="label2">Departure:</label>
                </div>
                <div class="col-md-3">
                    <p class="label2" id="dep-economy"></p>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-2">
                    <label class="label2">Adults:</label>
                </div>
                <div class="col-md-4">
                    <p class="label2" id="adu-economy"></p>
                </div>

                 <div class="col-md-2">
                    <label class="label2">Children:</label>
                </div>
                <div class="col-md-4">
                    <p class="label2" id="chi-economy"></p>
                </div>
            </div>

            <br/>

            <div class="row ml-2">
                <div class="col-md-12">
                    <label for="" class="header3">Additionals</label>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="label2">Lunch:</label>
                        </div>

                        <div class="col-md-6">
                            <p class="label2" id="lun-economy"></p>
                        </div>
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="label2">Dinner:</label>
                        </div>

                        <div class="col-md-6">
                            <p class="label2" id="din-economy"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ml-2">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="label2">Concierge:</label>
                        </div>

                        <div class="col-md-6">
                            <p class="label2" id="con-economy"></p>
                        </div>
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="label2">Extra Bed:</label>
                        </div>

                        <div class="col-md-6">
                            <p class="label2" id="be-economy"></p>
                        </div>
                    </div>
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
                    <p class="label2" id="spec-economy"></p>
                </div>
            </div>

        </div>


      <div class="modal-footer" id="footersss">
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#reserve-modal-economy">Back</button>
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#payment-modal-economy">Proceed to Payment</button>
      </div>
    </div>
  </div>
x</div>


