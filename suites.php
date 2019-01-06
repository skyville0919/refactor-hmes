<?php include('sidebar-header.php') ?>

    <div class="ml-4">
        <div class="suites-header" data-aos="fade-right" data-aos-duration="1500">Rooms & Suites</div>
        <br/>
        <div class="subtitle">We offer you the best accomodations. Enjoy the home of luxury at Corinthnians Hotel!</div>
    </div>

    <br/>

    <div class="row ml-4" data-aos="fade-right" data-aos-duration="3000">
        
        <?php 
            $query = "SELECT * FROM bedroom WHERE Bed_Type = 'STUDIO-ROOM' AND status = 'ACTIVE'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
                while($row=mysqli_fetch_array($result)){
                ?> 
                    <div class="col-md-4 image-wrapper">
                        <img class="custm-img suites-img" src="<?php echo $row['Bed_Image'] ?>" />
                             <div class="suite-overlay">
                                <div class="overlay-content fadeIn">
                                    <div class="suite-name"><?php echo $row['Bed_Type'] ?></div>
                                        <div class="suite-name-sub">SKY STUDIO</div>
                                            <div class="suite-more-btn">
                                                <button type=button class="btn custm-btn booknow" data-toggle="modal" data-target="#studio-modal" data-id="<?php echo $row['Bed_ID'] ?>" name="booknow" id="booknow">more...</button>
                                            </div>
                                </div>
                            </div>
                    </div>
                <?php
                }
            }
        ?>


        <?php 
            $query = "SELECT * FROM bedroom WHERE Bed_Type = 'ECONOMY-SINGLE' AND status = 'ACTIVE'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
                while($row=mysqli_fetch_array($result)){
                ?> 
                    <div class="col-md-4 image-wrapper">
                        <img class="custm-img suites-img" src="<?php echo $row['Bed_Image'] ?>" />
                             <div class="suite-overlay">
                                <div class="overlay-content fadeIn">
                                    <div class="suite-name"><?php echo $row['Bed_Type'] ?></div>
                                        <div class="suite-name-sub">SKY SINGLE</div>
                                            <div class="suite-more-btn">
                                                <button type=button class="btn custm-btn booknow" data-toggle="modal" data-target="#economy-modal" data-id="<?php echo $row['Bed_ID'] ?>" name="booknow" id="booknow">more...</button>
                                            </div>
                                </div>
                            </div>
                    </div>
                <?php
                }
            }
        ?>



        <div class="col-md-4 image-wrapper">
            <img class="custm-img suites-img" src="images/twin.jpg" />
                <div class="suite-overlay">
                    <div class="overlay-content fadeIn">
                        <div class="suite-name">STANDARD TWIN <br/> ROOM</div>
                            <div class="suite-name-sub">SKY TWIN</div>
                                <div class="suite-more-btn">
                                    <button type=button class="btn custm-btn">more...</button>
                                </div>
                    </div>
                </div>
        </div>

    </div>

    <br/><br/>

    <div class="row ml-4" data-aos="fade-left" data-aos-duration="3000">
        
        <div class="col-md-4 image-wrapper">
            <img class="custm-img suites-img" src="images/deluxe.jpg" />
                <div class="suite-overlay">
                    <div class="overlay-content fadeIn">
                        <div class="suite-name">CORINTHIAN ROOM</div>
                            <div class="suite-name-sub">Deluxe Room</div>
                                <div class="suite-more-btn">
                                    <button type=button class="btn custm-btn">more...</button>
                                </div>
                    </div>
                </div>
        </div>

        <div class="col-md-4 image-wrapper">
            <img class="custm-img suites-img" src="images/grand.jpeg" />
                <div class="suite-overlay">
                    <div class="overlay-content fadeIn">
                        <div class="suite-name">CORINTHIAN ROOM <br/>WITH A VIEW</div>
                            <div class="suite-name-sub">Grand Deluxe</div>
                                <div class="suite-more-btn">
                                    <button type=button class="btn custm-btn">more...</button>
                                </div>
                    </div>
                </div>
        </div>

        <div class="col-md-4 image-wrapper">
            <img class="custm-img suites-img" src="images/suite1.jpg" />
                <div class="suite-overlay">
                    <div class="overlay-content fadeIn">
                        <div class="suite-name">THE LEVEL ROOM</div>
                            <div class="suite-name-sub">SKY Suite</div>
                                <div class="suite-more-btn">
                                    <button type=button class="btn custm-btn">more...</button>
                                </div>
                    </div>
                </div>
        </div>

    </div>

    <br/><br/>

<div class="row ml-4" data-aos="fade-right" data-aos-duration="3000">
    
    <div class="col-md-4 image-wrapper">
        <img class="custm-img suites-img" src="images/junior.jpg" />
            <div class="suite-overlay">
                <div class="overlay-content fadeIn">
                    <div class="suite-name">THE LEVEL <br/> JUNIOR SUITE</div>
                        <div class="suite-name-sub">Junior Suite</div>
                            <div class="suite-more-btn">
                                <button type=button class="btn custm-btn">more...</button>
                            </div>
                </div>
            </div>
    </div>

    <div class="col-md-4 image-wrapper">
        <img class="custm-img suites-img" src="images/sign.jpg" />
            <div class="suite-overlay">
                <div class="overlay-content fadeIn">
                    <div class="suite-name">PREMIUM SUITE</div>
                        <div class="suite-name-sub">SIGNATURE suite</div>
                            <div class="suite-more-btn">
                                <button type=button class="btn custm-btn">more...</button>
                            </div>
                </div>
            </div>
    </div>

    <div class="col-md-4 image-wrapper">
        <img class="custm-img suites-img" src="images/exec.jpg" />
            <div class="suite-overlay">
                <div class="overlay-content fadeIn">
                    <div class="suite-name">THE GRAND PREMIUM</div>
                        <div class="suite-name-sub">Executive Suite</div>
                            <div class="suite-more-btn">
                                <button type=button class="btn custm-btn">more...</button>
                            </div>
                </div>
            </div>
    </div>
</div>

<div class="footer-container mt-4" data-aos="fade-down" data-aos-duration="2000">
    <div class="offset-4" data-aos="fade-right" data-aos-duration="2000">
        <div class="row ml-4">
            <div class="who-we-are">Get in Touch!</div>
        </div>

        <div class="row ml-4">
            <div class="we-are">Experience the home of luxury.</div>
        </div>

        <br/>

        <div class="row ml-4">
            <a href="contact.php"><button class="custm-contact-btn btn btn-primary mb-4">CONTACT ME!</button></a>
        </div>
    </div>
</div>


    <script type="text/javascript">

    </script>
<?php include('modals/suites/studio/modal.php') ?>
<?php include('modals/suites/economy/modal.php') ?>


<!-- 4TH -->


<!-- 4TH END -->

	
	


<?php include('sidebar-footer.php') ?>




