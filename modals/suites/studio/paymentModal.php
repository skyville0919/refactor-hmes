
<button type="button" data-toggle="modal" data-dismiss="modal" data-target="#payment-modal">3</button>

<!-- Modal -->
<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
           $query = "SELECT * FROM bedroom WHERE Bed_Type = 'STUDIO-ROOM'";
           $result = mysqli_query($db,$query);
           $row = mysqli_fetch_array($result);
      ?>
        <h5 class="custm-title" id=""><?php echo$row['Bed_Type'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
        <form id="offCard">
            <div class="row">
                <div class="col-md-12 text-center">
                    <label for="" class="header2">PAYMENT</label>
                </div>
            </div>



            <div class="row ml-2" id="cashPayment">
                <label class="checkbox-container-payment label2">Cash Payment
                    <input type="radio" name="method" id="cash" value="cashPaid" onchange="handleChange()"></input><span class="checkmark-payment"></span>
                </label>
            </div>   
            
            <div class="row ml-2" id="cardPayment">
                <label class="checkbox-container-payment label2">Card Payment
                    <input type="radio" name="method" id="card" value="cardPaid" onchange="handleChange()"></input><span class="checkmark-payment"></span>
                </label>
            </div>  

            <div class="row ml-4" id="paymentStatus">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="checkbox" class="custm-checkbox" id="half" name="hall"  value="2" onchange="addonsChecker()">
                        </div>
                        <div class="col-md-10">
                            <p class="label2">Half Payment</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="checkbox" class="custm-checkbox" id="full" value="2" name="hall"  onchange="addonsChecker()">
                        </div>
                        <div class="col-md-10">
                            <p class="label2">Full Payment</p>
                        </div>
                    </div>
                </div>
            </div>

            <br/>

            <div class="row ml-2" id="cashMethod" hidden>
                <div class="col-md-11 custm-message-box">
                    <p class="message1">An email will be sent to you containing the step by step procedure on how to pay on cash.</p>
                </div>
            </div>

            <div class="row ml-3" id="cardMethod" hidden>
                <div class="row">
                    <div class="col-md-12">
                        <input type="radio" class="custm-radio" id="off" name="card" value="cardset" onchange="master()">
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
                        <input type="radio" class="custm-radio" id="on" name="card" value="paypalset" onchange="master()">
                            <button class="btn-outline"><img src="images/paypal-logo.png" width="60px" height="30px"></button>
                        </input>
                    </div>
                </div>
            </div>

            <br/>
            <!-- MASTERCARD -->
                <div class="row" id="cardForm" hidden>
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="exp_month" id="" class="form-control custm-input">
                                            <option value="">--</option>
                                            <option value="01">01 Jan</option>
                                            <option value="02">02 Feb</option>
                                            <option value="03">03 Mar</option>
                                            <option value="04">04 Apr</option>
                                            <option value="05">05 May</option>
                                            <option value="06">06 Jun</option>
                                            <option value="07">07 Jul</option>
                                            <option value="08">08 Aug</option>
                                            <option value="09">09 Sep</option>
                                            <option value="10">10 Oct</option>
                                            <option value="11">11 Nov</option>
                                            <option value="12">12 Dec</option>
                                        </select>
                                    </div> <div class="col-md-4">
                                        <select name="exp_year" id="" class="form-control custm-input">
                                            <option value="">--</option>
                                            <option value="19">2019</option>
                                            <option value="20">2020</option>
                                            <option value="21">2021</option>
                                            <option value="22">2022</option>
                                            <option value="23">2023</option>
                                            <option value="24">2024</option>
                                            <option value="25">2025</option>
                                            <option value="26">2026</option>
                                            <option value="27">2027</option>
                                            <option value="28">2028</option>
                                            <option value="29">2029</option>
                                            <option value="30">2030</option>
                                        </select>
                                    </div>
                                </div>
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

            <div class="row ml-2" id="onCard" hidden>
                <div class="col-md-11 custm-message-box">
                    <p class="message1">Finish reservation to redirect to paypal online payment.</p>
                </div>
            </div>

            <br/>
             
             <div class="row ml-4" id="tncCheck" hidden>
                <input type="checkbox" class="custm-checkbox" disabled>
                    <p class="termsP ml-4"> I have read and agreed to the <a class="termsLink" href="#tncModal" data-toggle="modal" data-dismiss="modal">Terms & Conditions</a> <br/>and <a class="termsLink" data-toggle="modal" data-dismiss="modal" href="#pnpModal">Privacy & Policy</a>.</p>
                </input>
            </div>

            <div class="row ml-4" id="tncCheck2" hidden>
                <input type="checkbox" class="custm-checkbox" disabled>
                    <p class="termsP ml-4"> I have read and agreed to the <a class="termsLink" href="#tncModal" data-toggle="modal" data-dismiss="modal">Terms & Conditions</a> <br/>and <a class="termsLink" data-toggle="modal" data-dismiss="modal" href="#pnpModal">Privacy & Policy</a>.</p>
                </input>
            </div>


        </div>
        
      <div class="modal-footer" id="foot">
        <button type="button" class="btn custm-modal-btn" data-toggle="modal" data-dismiss="modal" data-target="#summary-modal">Back</button>
        <button type="submit" class="btn custm-modal-btn" disabled>Check the policy first</button>
      </div>
    </div>
  </div>
</div>


