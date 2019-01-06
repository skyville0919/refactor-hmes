

<!-- Modal -->
<div class="modal fade" id="reserve-modal-economy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <form id="details-form-economy">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="custm-input-label" for="firstname">Firstname<span class="asterisk">*</span>
                                <input type="text" class="form-control custm-input" name="firstname" id="firstname-economy" required></input>
                            </label>
                        </div>
                    
                        <div class="col-md-6">
                            <label class="custm-input-label" for="lastname">Lastname<span class="asterisk">*</span>
                                <input type="text" class="form-control custm-input" name="lastname" id="lastname-economy" required></input>
                            </label>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <label class="custm-input-label" for="arrival">Arrival Date<span class="asterisk">*</span>
                                <input type="date" class="form-control custm-input" name="arrival" id="arrival-economy" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>" required></input>
                            </label>
                        </div>

                        <div class="col-md-6">
                            <label class="custm-input-label" for="departure">Departure Date<span class="asterisk">*</span>
                                <input type="date" class="form-control custm-input" name="departure" id="departure-economy" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>" required></input>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="custm-input-label" for="adult">Number of Adults<span class="asterisk">*</span>
                                <input type="number" class="form-control custm-input" name="adult" id="adult-economy" value="1" min="1" required></input>
                            </label>
                        </div>

                        <div class="col-md-6">
                            <label class="custm-input-label" for="child">Number of children
                                <input type="number" class="form-control custm-input" name="child" id="child-economy"></input>
                            </label>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <h4 class="text-center">Add-Ons</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4" id="lunchChecked">
                                <label class="custm-input-label checkbox-container">Lunch
                                    <input type="checkbox" value="" name="add[]" id="lunch-economy" onchange="addonsEconomy()"> <span class="checkmark"></span>
                                    </input>
                                </label>
                        </div>

                        <div class="col-md-4" id="dinnerChecked">
                            <label class="custm-input-label checkbox-container">Dinner
                                <input type="checkbox" value=""  name="add[]" id="dinner-economy" onchange="addonsEconomy()"> <span class="checkmark"></span>
                                </input>
                            </label>
                        </div>

                        <div class="col-md-4" id="conChecked">
                            <label class="custm-input-label checkbox-container">Concierge
                                <input type="checkbox" value="" name="add[]" id="concierge-economy" onchange="addonsEconomy()">  <span class="checkmark"></span>
                                </input>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" id="bedChecked">
                            <label class="custm-input-label checkbox-container">Extra Bed
                                <input type="checkbox" value="" name="add[]" id="bed-economy" onchange="addonsEconomy()"> <span class="checkmark" checked=""></span>
                                </input>
                            </label>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="remarsks" class="custm-input-label">Special Requests
                                <textarea class="custm-input custm-textarea col-md-12" name="remarks" id="remarks-economy"></textarea>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="bed_id" id="bed_id" />
                </div>
            </div>
            </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#summary-modal-economy" onclick="getEconomy()">Next</button>
      </div>
  
    </div>
  </div>
</div>


