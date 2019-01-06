</div>
    </div>

    <div class="overlay"></div>

    <script src="plugins/aos/aos.js"></script>
    <script> AOS.init(); </script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="bootstrap/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="bootstrap/js/jquery.mCustomScrollbar.concat.min.js"></script>

	  <!-- DATATABLES -->
	  <script src="bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="bootstrap/js/dataTables.bootstrap4.min.js"></script>
    <script src="bootstrap/js/dataTables.fixedHeader.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

			$('.booknow').on('click', function(e){
			let bed_id = $(e.target).data('id');
			$('#bed_id').val(bed_id);
			console.log(bed_id);
		});

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
			});
			
	// 		var table = $('#example').DataTable( {
    //     	fixedHeader: true

    // } );

	$(document).ready(function() {
		$('#example').DataTable();
	})

        });


        if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}
            

      	function getDetails() {
			var firstname = document.getElementById("firstname").value;
			var lastname = document.getElementById("lastname").value;
			document.getElementById("name").innerHTML=firstname.toUpperCase()+" "+lastname.toUpperCase();


			var arrival = document.getElementById("arrival").value;
			var departure = document.getElementById("departure").value;

			document.getElementById("arr").innerHTML = arrival;
			document.getElementById("dep").innerHTML = departure;

			var adult = document.getElementById("adult").value;
			var child = document.getElementById("child").value;

			document.getElementById("adu").innerHTML = adult;
			document.getElementById("chi").innerHTML = child;

			var lunch = document.getElementById("lunch").checked;
			
			if (lunch == true) {
				document.getElementById("lun").innerHTML = "Yes";
			} else {
				document.getElementById("lun").innerHTML = "No";
			}

			var dinner = document.getElementById("dinner").checked;

			if (dinner == true) {
				document.getElementById("din").innerHTML = "Yes";
			} else {
				document.getElementById("din").innerHTML = "No";
			}

			var concierge = document.getElementById("concierge").checked;
			if (concierge == true) {
				document.getElementById("con").innerHTML = "Yes";
			} else {
				document.getElementById("con").innerHTML = "No";
			}


			var bed = document.getElementById("bed").checked;
			if (bed == true) {
				document.getElementById("be").innerHTML = "Yes";
			} else {
				document.getElementById("be").innerHTML = "No";
			}

			var remarks = document.getElementById("remarks").value;
			document.getElementById("spec").innerHTML = remarks;

		}

		function getEconomy() {
			var firstname = document.getElementById("firstname-economy").value;
			var lastname = document.getElementById("lastname-economy").value;
			document.getElementById("name-economy").innerHTML=firstname.toUpperCase()+" "+lastname.toUpperCase();


			var arrival = document.getElementById("arrival-economy").value;
			var departure = document.getElementById("departure-economy").value;

			document.getElementById("arr-economy").innerHTML = arrival;
			document.getElementById("dep-economy").innerHTML = departure;

			var adult = document.getElementById("adult-economy").value;
			var child = document.getElementById("child-economy").value;

			document.getElementById("adu-economy").innerHTML = adult;
			document.getElementById("chi-economy").innerHTML = child;

			var lunch = document.getElementById("lunch-economy").checked;
			
			if (lunch == true) {
				document.getElementById("lun-economy").innerHTML = "Yes";
			} else {
				document.getElementById("lun-economy").innerHTML = "No";
			}

			var dinner = document.getElementById("dinner-economy").checked;

			if (dinner == true) {
				document.getElementById("din-economy").innerHTML = "Yes";
			} else {
				document.getElementById("din-economy").innerHTML = "No";
			}

			var concierge = document.getElementById("concierge-economy").checked;
			if (concierge == true) {
				document.getElementById("con-economy").innerHTML = "Yes";
			} else {
				document.getElementById("con-economy").innerHTML = "No";
			}


			var bed = document.getElementById("bed-economy").checked;
			if (bed == true) {
				document.getElementById("be-economy").innerHTML = "Yes";
			} else {
				document.getElementById("be-economy").innerHTML = "No";
			}

			var remarks = document.getElementById("remarks-economy").value;
			document.getElementById("spec-economy").innerHTML = remarks;

		}


		function getFacility() {
			//FACILITy START //
			var firstname = document.getElementById("firstname").value;
			var lastname = document.getElementById("lastname").value;
			document.getElementById("name").innerHTML=firstname.toUpperCase()+" "+lastname.toUpperCase();

			var facility = document.getElementById("fac_type").value;
			document.getElementById("facility").innerHTML = facility;

			var time1 = document.getElementById("timein").value;
			var date1 = document.getElementById("datein").value;
			document.getElementById("dates1").innerHTML = date1;
			document.getElementById("times1").innerHTML = time1;

			var time2 = document.getElementById("timeout").value;
			var date2 = document.getElementById("dateout").value;
			document.getElementById("dates2").innerHTML = date2;
			document.getElementById("times2").innerHTML = time2;

			var attend = document.getElementById("attendees").value;
			document.getElementById("attend").innerHTML = attend;

			var remarks2 = document.getElementById("remarks2").value;
			document.getElementById("spec2").innerHTML = remarks2;

		
			//FACILITY END //

		}

		function getRestaurant() {
			//FACILITy START //
			var firstname = document.getElementById("firstname").value;
			var lastname = document.getElementById("lastname").value;
			document.getElementById("name").innerHTML=firstname.toUpperCase()+" "+lastname.toUpperCase();

			var restaurant = document.getElementById("res_type").value;
			document.getElementById("restaurant").innerHTML = restaurant;

			var time = document.getElementById("time").value;
			var date = document.getElementById("date").value;
			document.getElementById("date2").innerHTML = date;
			document.getElementById("time2").innerHTML = time;


			var attend = document.getElementById("seats").value;
			document.getElementById("seats2").innerHTML = attend;

			var remarks2 = document.getElementById("remarks3").value;
			document.getElementById("spec2").innerHTML = remarks2;

		
			//FACILITY END //

		}

        function addbed(){
			var bed=document.getElementById("extrabed");
			bed.innerHTML = "<label class='form-check-label'><input class='form-check-input' type='checkbox' value='' name='bed' id='bed' checked=''> Extra Bed<span class='form-check-sign'></span></label>&nbsp;&nbsp;<input type='number' name='extra' min='1' max='4' value='' class='btn-outline text-center' id='bednum'>";
		}
		function cash(){
			var credit=document.getElementById("credit");
			credit.innerHTML = "<label class='form-check-label'><input class='form-check-input' type='checkbox' value='' onclick='credit()'>Use the same address as contact information.<span class='form-check-sign'></span></label>";
		}
		function credit(){
			var cash=document.getElementById("cash");
			cash.innerHTML = "<label class='form-check-label'><input class='form-check-input' type='checkbox' value='' onclick='cash()'>Pay on Cash.<span class='form-check-sign'></span></label>";
		}
		function checkpolicy(){
			var policy=document.getElementById("tncCheck");
			policy.innerHTML = "<input type='checkbox' class='custm-checkbox' checked><p class='termsP ml-4'>I have read and agreed to the<a class='termsLink' href='#tncModal' data-toggle='modal' data-dismiss='modal'>Terms & condition</a> <br/>and<a class='termsLink' data-toggle='modal' data-dismiss='modal' href='#pnpModal'>Privacy & Policy</a></p></input>"

			var policy=document.getElementById("tncCheck2");
			policy.innerHTML = "<input type='checkbox' class='custm-checkbox' checked><p class='termsP ml-4'>I have read and agreed to the<a class='termsLink' href='#tncModal' data-toggle='modal' data-dismiss='modal'>Terms & condition</a> <br/>and<a class='termsLink' data-toggle='modal' data-dismiss='modal' href='#pnpModal'>Privacy & Policy</a></p></input>"

			var footer=document.getElementById("foot");
			footer.innerHTML="<button type='button' class='btn custm-modal-btn' data-toggle='modal' data-dismiss='modal' data-target='#summary-facility'>Back</button><form method='POST' id='result' action='intoDb.php' onsubmit='mergeSubmit(); return true;'><input type='submit' class='btn btn-primary' name='reserve' value='Reserve'></input></form>"


			$(document).ready(function(){
				$("#confirm").click(function(){
				$("#myModal2").modal("hide");
				disable();
			});
			});
		}

		function checkPolicy2() {
			var policys=document.getElementById("tncCheck22");
			policys.innerHTML = "<input type='checkbox' class='custm-checkbox' checked><p class='termsP ml-4'>I have read and agreed to the<a class='termsLink' href='#tncModal2' data-toggle='modal' data-dismiss='modal'>Terms & condition</a> <br/>and<a class='termsLink' data-toggle='modal' data-dismiss='modal' href='#pnpModal2'>Privacy & Policy</a></p></input>"

			var footers=document.getElementById("foot-facility");
			footers.innerHTML="<button type='button' class='btn custm-modal-btn' data-toggle='modal' data-dismiss='modal' data-target='#summary-facility'>Back</button><form method='POST' id='result2' action='facToDb.php' onsubmit='mergeSubmit2(); return true;'><input type='submit' class='btn btn-primary' name='reserve' value='Reserve'></input></form>"
		}


		function checkPolicy3() {
			var policys=document.getElementById("tncCheck");
			policys.innerHTML = "<input type='checkbox' class='custm-checkbox' checked><p class='termsP ml-4'>I have read and agreed to the<a class='termsLink' href='#tncModal3' data-toggle='modal' data-dismiss='modal'>Terms & condition</a> <br/>and<a class='termsLink' data-toggle='modal' data-dismiss='modal' href='#pnpModal3'>Privacy & Policy</a></p></input>"

			var footers=document.getElementById("foot-restaurant");
			footers.innerHTML="<button type='button' class='btn custm-modal-btn' data-toggle='modal' data-dismiss='modal' data-target='#summary-restaurant'>Back</button><form method='POST' id='result3' action='resToDb.php' onsubmit='mergeSubmit3(); return true;'><input type='submit' class='btn btn-primary' name='reserve' value='Reserve'></input></form>"
		}

		function checkEconomy(){
			var policyeconomy=document.getElementById("tncCheck-economy");
			policyeconomy.innerHTML = "<input type='checkbox' class='custm-checkbox' checked><p class='termsP ml-4'>I have read and agreed to the<a class='termsLink' href='#tncModal' data-toggle='modal' data-dismiss='modal'>Terms & condition</a> <br/>and<a class='termsLink' data-toggle='modal' data-dismiss='modal' href='#pnpModal'>Privacy & Policy</a></p></input>"

			var footereconomy=document.getElementById("foot-economy");
			footereconomy.innerHTML="<button type='button' class='btn custm-modal-btn' data-toggle='modal' data-dismiss='modal' data-target='#summary-facility'>Back</button><form method='POST' id='resultEconomy' action='econToDb.php' onsubmit='mergeEconomy(); return true;'><input type='submit' class='btn btn-primary' name='reserve' value='Reserve'></input></form>"
		}

		// function disable(){
		// 	var footer=document.getElementById("foot");
		// 	foot.innerHTML="<button type='button' class='btn btn-danger' data-dismiss='modal' data-toggle='modal' data-target='#myModal' >Back</button><button type='button' class='btn btn-danger' data-dismiss='modal' data-toggle='modal' data-target='' disabled=''>Confirm</button>";
		// }

		function defaultpolicy(){
			var ppfoot=document.getElementById("pnpfooter");
			ppfoot.innerHTML="<button type='button' class='btn btn-danger' data-dismiss='modal' id='decline1'>Decline</button><button type='button' class='btn btn-danger' onclick='checkpolicy()' data-dismiss='modal' data-toggle='modal' data-target='#myModal2' id='agree'>Agree</button>";

			var tcfoot=document.getElementById("tncfooter");
			ttfoot.innerHTML="<button type='button' class='btn btn-danger' data-dismiss='modal' id='decline2'>Decline</button><button type='button' class='btn btn-danger' onclick='checkpolicy()' data-dismiss='modal' data-toggle='modal' data-target='#myModal2' id='agree'>Agree</button>";

			var confrim=document.getElementById("foot");
			confirm.innerHTML="<button type='button' class='btn btn-danger' data-dismiss='modal' data-toggle='modal' data-target='#myModal' >Back</button><button type='button' class='btn btn-danger' data-dismiss='modal' data-toggle='modal' data-target='' disabled id='confirm' >Confirm</button>";
		}

		
			if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}

		function addonChange() {
			var addon=document.getElementById("addons").value;
			console.log(addon);
			if (addon == "lunch" || addon == "dinner") {
				document.getElementById("remarks").removeAttribute("hidden");
				document.getElementById("bed").setAttribute("hidden", "hidden");
				document.getElementById("submit").removeAttribute("hidden");
				document.getElementById("description").setAttribute("hidden", "hidden");
			}
			else if (addon == "bed") {
				document.getElementById("bed").removeAttribute("hidden");
				document.getElementById("remarks").setAttribute("hidden", "hidden");
				document.getElementById("submit").removeAttribute("hidden");
				document.getElementById("description").setAttribute("hidden", "hidden");
			}
			else {
				document.getElementById("remarks").setAttribute("hidden", "hidden");
				document.getElementById("bed").setAttribute("hidden", "hidden");
				document.getElementById("description").removeAttribute("hidden");
				document.getElementById("submit").removeAttribute("hidden");
			}
		}

	
		function handleChange() {
			var card = document.getElementById("card").checked;
			var cash = document.getElementById("cash").checked;
			if (card == true) {
				// document.getElementById("tncCheck2").removeAttribute('hidden');
				document.getElementById("cardMethod").removeAttribute('hidden');
				document.getElementById("tncCheck").setAttribute('hidden', 'hidden');
				document.getElementById("cashMethod").setAttribute('hidden','hidden');
			} else if (cash == true) {
				document.getElementById("cashMethod").removeAttribute('hidden');				
				document.getElementById("tncCheck").removeAttribute('hidden');
				document.getElementById("cardMethod").setAttribute('hidden','hidden');
				document.getElementById("onCard").setAttribute('hidden', 'hidden');
				document.getElementById("cardForm").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck").setAttribute('hidden', 'hidden');
				// document.getElementById("cardMethod").setAttribute('hidden','hidden');
				// document.getElementById("cashMethod").setAttribute('hidden','hidden');
				// document.getElementById("onCard").setAttribute('hidden', 'hidden');
				// document.getElementById("offCard").setAttribute('hidden', 'hidden');
					
			}
			else {
				document.getElementById("cardMethod").setAttribute('hidden','hidden');
				document.getElementById("cashMethod").setAttribute('hidden','hidden');
				document.getElementById("tncCheck").setAttribute('hidden', 'hidden');
			}
		}	

		function master() {
			var master = document.getElementById("off").checked;
			var paypal = document.getElementById("on").checked;
			if (master == true) {
				document.getElementById("tncCheck").removeAttribute('hidden');
				// document.getElementById("cardMethod").removeAttribute('hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				document.getElementById("cardForm").removeAttribute('hidden');
				document.getElementById("onCard").setAttribute('hidden', 'hidden');
			} else if(paypal==true)  {
				// document.getElementById("cardMethod").removeAttribute('hidden');
				document.getElementById("tncCheck").removeAttribute('hidden');
				document.getElementById("cardForm").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				document.getElementById("onCard").removeAttribute('hidden');
			}
			// else if (paypal == true) {
			// 	document.getElementById("tncCheck2").removeAttribute('hidden');
			// 	document.getElementById("onCard").removeAttribute('hidden');
			// 	document.getElementById("offCard").setAttribute('hidden', 'hidden');

			// } else {
			// 	document.getElementById("offCard").setAttribute('hidden', 'hidden');
			// 	document.getElementById("onCard").setAttribute('hidden', 'hidden');
			// 	document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
			// 	document.getElementById("tncCheck").setAttribute('hidden', 'hidden');

			// }
		}

		function handleChange2() {
			var card = document.getElementById("card").checked;
			var cash = document.getElementById("cash").checked;
			if (card == true) {
				// document.getElementById("tncCheck2").removeAttribute('hidden');
				document.getElementById("cardMethod").removeAttribute('hidden');
				document.getElementById("tncCheck22").setAttribute('hidden', 'hidden');
				document.getElementById("cashMethod").setAttribute('hidden','hidden');
			} else if (cash == true) {
				document.getElementById("cashMethod").removeAttribute('hidden');				
				document.getElementById("tncCheck22").removeAttribute('hidden');
				document.getElementById("cardMethod").setAttribute('hidden','hidden');
				document.getElementById("onCard").setAttribute('hidden', 'hidden');
				document.getElementById("cardForm").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck").setAttribute('hidden', 'hidden');
				// document.getElementById("cardMethod").setAttribute('hidden','hidden');
				// document.getElementById("cashMethod").setAttribute('hidden','hidden');
				// document.getElementById("onCard").setAttribute('hidden', 'hidden');
				// document.getElementById("offCard").setAttribute('hidden', 'hidden');
					
			}
			else {
				document.getElementById("cardMethod").setAttribute('hidden','hidden');
				document.getElementById("cashMethod").setAttribute('hidden','hidden');
				document.getElementById("tncCheck22").setAttribute('hidden', 'hidden');
			}
		}	

		function master2() {
			var master = document.getElementById("off").checked;
			var paypal = document.getElementById("on").checked;
			if (master == true) {
				document.getElementById("tncCheck22").removeAttribute('hidden');
				// document.getElementById("cardMethod").removeAttribute('hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				document.getElementById("cardForm").removeAttribute('hidden');
				document.getElementById("onCard").setAttribute('hidden', 'hidden');
			} else if(paypal==true)  {
				// document.getElementById("cardMethod").removeAttribute('hidden');
				document.getElementById("tncCheck22").removeAttribute('hidden');
				document.getElementById("cardForm").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				document.getElementById("onCard").removeAttribute('hidden');
			}
			// else if (paypal == true) {
			// 	document.getElementById("tncCheck2").removeAttribute('hidden');
			// 	document.getElementById("onCard").removeAttribute('hidden');
			// 	document.getElementById("offCard").setAttribute('hidden', 'hidden');

			// } else {
			// 	document.getElementById("offCard").setAttribute('hidden', 'hidden');
			// 	document.getElementById("onCard").setAttribute('hidden', 'hidden');
			// 	document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
			// 	document.getElementById("tncCheck").setAttribute('hidden', 'hidden');

			// }
		}

		function addonsChecker() {
			
		
			if(document.getElementById("half").checked == true) {
				document.getElementById("full").setAttribute('disabled','disabled');
			} else if(document.getElementById("full").checked == true) {
				document.getElementById("half").setAttribute('disabled','disabled');
			} else {
				document.getElementById("full").removeAttribute('disabled');
				document.getElementById("half").removeAttribute('disabled');
			}
		}

		function handleEconomy() {
			var cardEconomy = document.getElementById("card-economy").checked;
			var cashEconomy = document.getElementById("cash-economy").checked;
			if (cardEconomy == true) {
				// document.getElementById("tncCheck2").removeAttribute('hidden');
				document.getElementById("cardMethod-economy").removeAttribute('hidden');
				document.getElementById("tncCheck-economy").setAttribute('hidden', 'hidden');
				document.getElementById("cashMethod-economy").setAttribute('hidden','hidden');
			} else if (cashEconomy == true) {
				document.getElementById("cashMethod-economy").removeAttribute('hidden');				
				document.getElementById("tncCheck-economy").removeAttribute('hidden');
				document.getElementById("cardMethod-economy").setAttribute('hidden','hidden');
				document.getElementById("onCard-economy").setAttribute('hidden', 'hidden');
				document.getElementById("cardForm-economy").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck").setAttribute('hidden', 'hidden');
				// document.getElementById("cardMethod").setAttribute('hidden','hidden');
				// document.getElementById("cashMethod").setAttribute('hidden','hidden');
				// document.getElementById("onCard").setAttribute('hidden', 'hidden');
				// document.getElementById("offCard").setAttribute('hidden', 'hidden');
					
			}
			else {
				document.getElementById("cardMethod-economy").setAttribute('hidden','hidden');
				document.getElementById("cashMethod-economy").setAttribute('hidden','hidden');
				document.getElementById("tncCheck-economy").setAttribute('hidden', 'hidden');
			}
		}	

		function masterEconomy() {
			var masterEconomy = document.getElementById("off-economy").checked;
			var paypalEconomy = document.getElementById("on-economy").checked;
			if (masterEconomy == true) {
				document.getElementById("tncCheck-economy").removeAttribute('hidden');
				// document.getElementById("cardMethod").removeAttribute('hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				document.getElementById("cardForm-economy").removeAttribute('hidden');
				document.getElementById("onCard-economy").setAttribute('hidden', 'hidden');
			} else if(paypalEconomy==true)  {
				// document.getElementById("cardMethod").removeAttribute('hidden');
				document.getElementById("tncCheck-economy").removeAttribute('hidden');
				document.getElementById("cardForm-economy").setAttribute('hidden', 'hidden');
				// document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
				document.getElementById("onCard-economy").removeAttribute('hidden');
			}
			// else if (paypal == true) {
			// 	document.getElementById("tncCheck2").removeAttribute('hidden');
			// 	document.getElementById("onCard").removeAttribute('hidden');
			// 	document.getElementById("offCard").setAttribute('hidden', 'hidden');

			// } else {
			// 	document.getElementById("offCard").setAttribute('hidden', 'hidden');
			// 	document.getElementById("onCard").setAttribute('hidden', 'hidden');
			// 	document.getElementById("tncCheck2").setAttribute('hidden', 'hidden');
			// 	document.getElementById("tncCheck").setAttribute('hidden', 'hidden');

			// }
		}

		function addonsEconomy() {
			
		
			if(document.getElementById("half-economy").checked == true) {
				document.getElementById("full-economy").setAttribute('disabled','disabled');
			} else if(document.getElementById("full-economy").checked == true) {
				document.getElementById("half-economy").setAttribute('disabled','disabled');
			} else {
				document.getElementById("full-economy").removeAttribute('disabled');
				document.getElementById("half-economy").removeAttribute('disabled');
			}
		}

		function mergeSubmit() {

			var lunch = document.getElementById("lunch").checked;
				if (lunch == true) {
					 document.getElementById("lunch").value = "Lunch";
					 console.log(document.getElementById("lunch").value);
				
				} else {
					document.getElementById("lunch").removeAttribute('value');
					console.log(document.getElementById("lunch").value);
				}

			var dinner = document.getElementById("dinner").checked;
				if (dinner == true) {
					 document.getElementById("dinner").value = "Dinner";
					 console.log(document.getElementById("dinner").value);
				
				} else {
					document.getElementById("dinner").removeAttribute('value');
					console.log(document.getElementById("dinner").value);
				}

			var concierge = document.getElementById("concierge").checked;
				if (concierge == true) {
					 document.getElementById("concierge").value = "Concierge";
					 console.log(document.getElementById("concierge").value);
				
				} else {
					document.getElementById("concierge").removeAttribute('value');
					console.log(document.getElementById("concierge").value);
				}

			var bed = document.getElementById("bed").checked;
				if (bed == true) {
					 document.getElementById("bed").value = "Extra-Bed";
					 console.log(document.getElementById("bed").value);
				
				} else {
					document.getElementById("bed").removeAttribute('value');
					console.log(document.getElementById("bed").value);
				}
			
			var half = document.getElementById("half").checked;
				if(half == true) {
					document.getElementById("full").value = "2";
					console.log(document.getElementById("full").value)
				} else {
					document.getElementById("full").value = "1";
					console.log(document.getElementById("full").value)	
				}

			$result = $("#result");
			$("#details-form input, #offCard input, #details-form textarea").each(function()  {
            $result.append("<input type='hidden' name='"+$(this).attr('name')+"'value='"+$(this).val()+"'/>")
			});
		}

function mergeEconomy() {

var luncheconomy = document.getElementById("lunch-economy").checked;
	if (luncheconomy == true) {
		 document.getElementById("lunch-economy").value = "Lunch";
		 console.log(document.getElementById("lunch-economy").value);
	
	} else {
		document.getElementById("lunch-economy").removeAttribute('value');
		console.log(document.getElementById("lunch-economy").value);
	}

var dinnereconomy = document.getElementById("dinner-economy").checked;
	if (dinnereconomy == true) {
		 document.getElementById("dinner-economy").value = "Dinner";
		 console.log(document.getElementById("dinner-economy").value);
	
	} else {
		document.getElementById("dinner-economy").removeAttribute('value');
		console.log(document.getElementById("dinner-economy").value);
	}

var conciergeeconomy = document.getElementById("concierge-economy").checked;
	if (conciergeeconomy == true) {
		 document.getElementById("concierge-economy").value = "Concierge";
		 console.log(document.getElementById("concierge-economy").value);
	
	} else {
		document.getElementById("concierge-economy").removeAttribute('value');
		console.log(document.getElementById("concierge-economy").value);
	}

var bedeconomy = document.getElementById("bed-economy").checked;
	if (bedeconomy == true) {
		 document.getElementById("bed-economy").value = "Extra-Bed";
		 console.log(document.getElementById("bed-economy").value);
	
	} else {
		document.getElementById("bed-economy").removeAttribute('value');
		console.log(document.getElementById("bed-economy").value);
	}

var halfeconomy = document.getElementById("half-economy").checked;
	if(halfeconomy == true) {
		document.getElementById("full-economy").value = "2";
		console.log(document.getElementById("full-economy").value)
	} else {
		document.getElementById("full-economy").value = "1";
		console.log(document.getElementById("full-economy").value)	
	}




$resultEconomy = $("#resultEconomy");
$("#details-form-economy input, #offCard-economy input, #details-form-economy textarea").each(function()  {
$resultEconomy.append("<input type='hidden' name='"+$(this).attr('name')+"'value='"+$(this).val()+"'/>")
});

    }

	function mergeSubmit2() {
		
		var half = document.getElementById("half").checked;
				if(half == true) {
					document.getElementById("full").value = "2";
					console.log(document.getElementById("full").value)
				} else {
					document.getElementById("full").value = "1";
					console.log(document.getElementById("full").value)	
				}


		$result = $("#result2");
		$("#details-form2 input, #offCard2 input, #details-form2 textarea, #details-form2 select").each(function()  {
		$result.append("<input type='hidden' name='"+$(this).attr('name')+"'value='"+$(this).val()+"'/>")
		});

	}

	function mergeSubmit3() {
		
		var half = document.getElementById("half").checked;
				if(half == true) {
					document.getElementById("full").value = "2";
					console.log(document.getElementById("full").value)
				} else {
					document.getElementById("full").value = "1";
					console.log(document.getElementById("full").value)	
				}


		$result = $("#result3");
		$("#details-form3 input, #offCard3 input, #details-form3 textarea, #details-form3 select").each(function()  {
		$result.append("<input type='hidden' name='"+$(this).attr('name')+"'value='"+$(this).val()+"'/>")
		});

	}

	
	      
    </script>
</body>

</html>