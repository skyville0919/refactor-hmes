
<

<!-- Modal -->
<div class="modal fade" id="payment-modal-economy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <form id="offCard-economy">
            <div class="row">
                <div class="col-md-12 text-center">
                    <label for="" class="header2">PAYMENT</label>
                </div>
            </div>



            <div class="row ml-2" id="cashPayment-economy">
                <label class="checkbox-container-payment label2">Cash Payment
                    <input type="radio" name="method" id="cash-economy" onchange="handleEconomy()"></input><span class="checkmark-payment"></span>
                </label>
            </div>   
            
            <div class="row ml-2" id="cardPayment-economy">
                <label class="checkbox-container-payment label2">Card Payment
                    <input type="radio" name="method" id="card-economy" onchange="handleEconomy()"></input><span class="checkmark-payment"></span>
                </label>
            </div>  

            <div class="row ml-4" id="paymentStatus">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="checkbox" class="custm-checkbox" value="2" id="half-economy" name="half"  onchange="addonsEconomy()">
                        </div>
                        <div class="col-md-10">
                            <p class="label2">Half Payment</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="checkbox" class="custm-checkbox" value="2" id="full-economy" name="full" onchange="addonsEconomy()">
                        </div>
                        <div class="col-md-10">
                            <p class="label2">Full Payment</p>
                        </div>
                    </div>
                </div>
            </div>

            <br/>

            <div class="row ml-2" id="cashMethod-economy" hidden>
                <div class="col-md-11 custm-message-box">
                    <p class="message1">An email will be sent to you containing the step by step procedure on how to pay on cash.</p>
                </div>
            </div>

            <div class="row ml-3" id="cardMethod-economy" hidden>
                <div class="row">
                    <div class="col-md-12">
                        <input type="radio" class="custm-radio" id="off-economy" name="cardset" onchange="masterEconomy()">
                            <button class="btn-outline"><img src="images/mastercard-logo.png" width="60px" height="30px"></button>
                            <button class="btn-outline"><img src="images/visa-logo.png" width="60px" height="30px"></button>
                            <button class="btn-outline"><img src="images/americane-logo.png" width="60px" height="30px"></button>
                            <button class="btn-outline"><img src="images/union-logo.png" width="60px" height="30px"></button>
                            <button class="btn-outline"><img src="images/jcb-logo.png" width="60px" height="30px"></button>
                        </input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="radio" class="custm-radio" id="on-economy" name="paypalset" onchange="masterEconomy()">
                            <button class="btn-outline"><img src="images/paypal-logo.png" width="60px" height="30px"></button>
                        </input>
                    </div>
                </div>
            </div>

            <br/>
            <!-- MASTERCARD -->
                <div class="row" id="cardForm-economy" hidden>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Name (as it appears on your card)
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control custm-input" name="cardName" id="cardName"></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Card Number (no dashes or spaces)
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control custm-input" name="cardNumber" id="cardNumber"></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Expiration date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>" class="form-control custm-input" name="cardExpiry" id="cardExpiry"></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Security Code (3 on back, Amex: 4 on front)</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control custm-input" name="cardCode" id="cardCode"></input>
                            </div>
                        </div>
                        

                    </div>  
                </div>
            <!-- MASTERCARD -->
    </form>

            <div class="row ml-2" id="onCard-economy" hidden>
                <div class="col-md-11 custm-message-box">
                    <p class="message1">Finish reservation to redirect to paypal online payment.</p>
                </div>
            </div>

            <br/>
             
             <div class="row ml-4" id="tncCheck-economy" hidden>
                <input type="checkbox" class="custm-checkbox" disabled>
                    <p class="termsP ml-4"> I have read and agreed to the <a class="termsLink" href="#tncModal-economy" data-toggle="modal" data-dismiss="modal">Terms & Conditions</a> <br/>and <a class="termsLink" data-toggle="modal" data-dismiss="modal" href="#pnpModal-economy">Privacy & Policy</a>.</p>
                </input>
            </div>
        </div>
        
      <div class="modal-footer" id="foot-economy">
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#summary-modal-economy">Back</button>
        <button type="submit" class="btn custm-modal-btn" disabled>Check the policy first</button>
      </div>
    </div>
  </div>
</div>


