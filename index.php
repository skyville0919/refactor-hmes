<?php include('sidebar-header.php') ?>




<!-- 2ND END -->

<!-- 3RD -->
<div class="row mt-4 custm-skyline-container mb-4">
        <div class="col-md-12">
            <img class="custm-img skyline-img" src="images/cover_bg_1.jpg">
        </div>

        <div class="row custm-overlay-first">
            <div class="col-md-5">
                <span class="iconss"><i class="flaticon-skyline"></i></span>
                    <span class="colorlib-counter-label custm-count count">1653</span>
                        <span class="colorlib-counter-label custm-label">ROOMS & SUITES</span>
            </div>
        </div>

        <div class="row custm-overlay-second">
            <div class="col-md-6" data-aos="fade-up" data-aos-duration="2000">
                <span class="iconss"><i class="flaticon-engineer"></i></span>
                    <span class="colorlib-counter-label custm-count count">3735</span>
                        <span class="colorlib-counter-label custm-label">FACILITIES</span>
            </div>
        </div>

        <div class="row custm-overlay-third" data-aos="fade-up" data-aos-duration="2000">
            <div class="col-md-6">
                <span class="iconss"><i class="flaticon-architect-with-helmet"></i></span>
                    <span class="colorlib-counter-label custm-count count">5684</span>
                    <span class="colorlib-counter-label custm-label">AMENITIES</span>
            </div>
        </div>

        <div class="row custm-overlay-fourth">
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="2000">
                <span class="iconss"><i class="flaticon-worker"></i></span>
                    <span class="colorlib-counter-label custm-count count">2594</span>
                        <span class="colorlib-counter-label custm-label">DINING & RESTAURANTS</span>
            </div>
        </div>
    
    </div>

<script type="text/javascript">
    $('.count').each(function (){
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>

<!-- 3RD END -->

<!-- CAROUSEL -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="item1"></li>
        <li calss="item2"></li>
        <li class="item3"></li>
    </ol>
        <div class="carousel-inner">
            <div class="carousel-item active col-md-12">
                <img class="d-block w-100 active" src="images/home1.jpg" alt="First slide">
                    <div class="text-block fadeInRight">
                        <h1>Corinthians Hotel</h1>
						    <h2>Experience a remarkable hotel experience at Corinthians Hotel, Home of luxury.</h2>
                    </div>
            </div>

            <div class="carousel-item col-md-112">
                <img class="d-block w-100" src="images/home2.jpg" alt="Second slide">
                    <div class="text-block fadeInRight">
                        <h1>A Relaxing Place</h1>
						    <h2>Creates a refined ambiance of understated elegance and classic luxury.</h2>
                    </div>
            </div>
            
            <div class="carousel-item col-md-12">
                <img class="d-block w-100" src="images/home.jpg" alt="Third slide">
                    <div class="text-block fadeInRight">
                        <h1>A Sophisticated Built Space</h1>
						    <h2>An Architechtural Design with Pleasant Ambiance.</h2>
                    </div>
            </div>
        </div>


    <a class="carousel-control-prev" href="#cmyCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
    </a>
</div>

<!-- CAROUSEL END -->

<br/>

<!-- FIRST -->

    <div class="row ml-1">
        <div class="col-md-5">
            <img class="about-img custm-img" data-aos="fade-right" data-aos-duration="2000" src="images/about.jpg" />
        </div>

        <div class="col-md-7">
            <div class="welcome">WELCOME</div>
                <div class="who-we-are custm-header" data-aos="fade-left" data-aos-duration="2000">WHO WE ARE</div>
                    <p class="desc">For more than 50 years, Corinthians Hotel has been established as a leader in luxury hospitality, and has a rich and proud history. 
				    Our mission, ‘to delight our guests each and every day’ began with the opening of our flagship property, The Corinthians in 1963 in Manila. 
                    The hotel, which was the tallest building on the city when it opened, soon built up an enviable reputation for service excellence, and instantly became a historic landmark – a status it still holds today. </p>
            
                <div class="row ml-4 mt-4">   
                    <div class="col-md-4" data-aos="fade-left" data-aos-duration="1000">
							<p class="icon"><span><i class="far fa-check-circle"></i></span></p>
								<p class="we-are">We are <br>pasionate</p>
                    </div>
                    <div class="col-md-4" data-aos="fade-left" data-aos-duration="2000">
							<p class="icon"><span><i class="far fa-check-circle"></i></span></p>
								<p class="we-are">Honest <br>Dependable</p>
                    </div>
                    <div class="col-md-4" data-aos="fade-left" data-aos-duration="3000">
							<p class="icon"><span><i class="far fa-check-circle"></i></span></p>
								<p class="we-are">Always <br>Improving</p>
                    </div>
                </div>
        </div>
    </div>
<!-- FIRST END -->


<!-- 2ND -->

    <div class="row ml-4 mt-4" data-aos="fade-right" data-aos-duration="2000">
        <div class="col-md-7">
            <div class="row">
                <div class=" col-md-12 welcome">WHAT WE DO?</div>
            </div>

            <div class="row">
                <div class="col-md-12 who-we-are">HERE ARE SOME OF OUR EVENTS!</div>
            </div>
       
            <div class="row mt-4">
		        <div class="colorlib-icon">
			        <i class="flaticon-worker"></i>
                </div>
                
			    <div class="colorlib-text ml-4">
				    <h3>Birthdays</h3>
					    <p>Can you imagine a better way to spend your special day <br/>than with a luxurious hotel venue? Celebrate it with us! </p>
                </div>
            </div>
            
            <div class="row mt-4">
		        <div class="colorlib-icon">
			        <i class="flaticon-sketch"></i>
                </div>
                
			    <div class="colorlib-text ml-4">
				    <h3>Weddings</h3>
					    <p>Can you imagine a better way to spend your special day <br/>than with a luxurious hotel venue? Celebrate it with us! </p>
                </div>
            </div>	

            <div class="row mt-4">
		        <div class="colorlib-icon">
			        <i class="flaticon-engineering"></i>
                </div>
                
			    <div class="colorlib-text ml-4">
				    <h3>Meetings &amp; Conference</h3>
					    <p>Can you imagine a better way to spend your special day <br/>than with a luxurious hotel venue? Celebrate it with us! </p>
                </div>
            </div>

            <div class="row mt-4">
		        <div class="colorlib-icon">
			        <i class="flaticon-crane"></i>
                </div>
                
			    <div class="colorlib-text ml-4">
				    <h3>And many more .....</h3>
					    <p>We offer at Corinthians feature state-of-the-art audiovisual <br/> equipment and conference facilities, exquisite menu options, <br/>and customized corporate meeting packages that suit your needs. </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <img class="mt-4 custm-img event-img" data-aos="fade-left" src="images/f1.jpg"/>
            <img class="mt-4 custm-img event-img" data-aos="fade-left"  data-aos-duration="1000" src="images/f2.jpg"/>
            <img class="mt-4 custm-img event-img" data-aos="fade-left"  data-aos-duration="2000" src="images/f4.jpg"/>

        </div>
    </div>

<!-- 4TH -->
<div class="footer-container mt-4" data-aos="fade-up" data-aos-duration="2000">
    <div class="offset-4" data-aos="fade-right" data-aos-duration="2000">
        <div class="row ml-4">
            <div class="who-we-are">Get in Touch!</div>
        </div>

        <div class="row ml-4">
            <div class="we-are">Experience the home of luxury.</div>
        </div>

        <br/>

        <div class="row ml-4 mb-4">
            <a href="contact.php"><button class="custm-contact-btn btn btn-primary mb-4">CONTACT ME!</button></a>
        </div>
    </div>
</div>

<!-- 4TH END -->

    
























<?php include('sidebar-footer.php') ?>
