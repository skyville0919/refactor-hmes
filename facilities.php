<?php include('sidebar-header.php') ?>

<?php 
    if(isset($_SESSION['accounts']) != "") {
        $islogin = "<button type='button' class='btn custm-fac-btn' data-aos='fade-down' data-aos-duration='3000' data-toggle='modal' data-dismiss='modal' data-target='#facility-modal'>Get Reservations</button>";
    } else {
        $islogin = $islogin = "<a href='login/'><button type='button' class='btn custm-fac-btn'>Get Reservations, login first!</button></a>";
    }
?>


<div class="ml-4">
    <div class="fac-header" data-aos="fade-right" data-aos-duration="1500">FACILITIES</div>
        <br/>
            <div class="subtitle" data-aos="fade-left" data-aos-duration="2000">
                All function room spaces at Corinthians feature state-of-the-art audiovisual equipment and conference facilities, exquisite menu options, and customized corporate meeting packages that suit your needs. <br/> We also have ample parking spaces and complimentary Wi-Fi access for guests.
            </div>

    <br/>

    <?php echo $islogin ?>
</div>

<br/>

<div class="row ml-4">

    <div class="col-md-4"  data-aos="fade-right" data-aos-duration="3000">
        <img class="custm-img fac-img" src="images/f1.jpg" />
            <div class="fac-name">Fiesta Pavilion</div>
                <div class="fac-name-sub">
                The Fiesta Pavilion is a popular choice for big conventions. It is a perfect balance between the old and the new, the traditional and progressive. It is easily divisible into 3 self-contained function rooms, namely the Pandanggo, the Polkabal and the Rigodon, catering to more intimate functions such as weddings and balls. The ballroom is equipped 
				with state-of-the-art ceiling and lighting ﬁxtures that showcase seamless interplay between light and sound – an advantage for event organizers to match their events’ theme.
                </div>
    </div>  

    <div class="col-md-4"  data-aos="fade-down" data-aos-duration="3000">
        <img class="custm-img fac-img" src="images/f2.jpg" />
            <div class="fac-name">Centennial Hall</div>
                <div class="fac-name-sub">
                The Centennial Hall’s is spacious venue can accommodate large events but it is also easily divisible into two halls that are perfect for smaller functions. It is a ballroom of choice for conventions, conferences, and exhibits with its vast ﬂoor area 
				and modern integrated facilities.
                </div>
    </div>  

    <div class="col-md-4"  data-aos="fade-left" data-aos-duration="3000">
        <img class="custm-img fac-img" src="images/f3.jpg" />
            <div class="fac-name">Champagne Hall</div>
                <div class="fac-name-sub">
                A favorite venue for elegant gatherings and celebrations, the Champagne Room best embodies 
				the Grand Dame’s decades of tradition and devotion to providing guests with only the finest dining experience.
                </div>
    </div> 
    
</div>

<div class="row ml-4 mt-4">
<div class="col-md-4"  data-aos="fade-right" data-aos-duration="3000">
    <img class="custm-img fac-img" src="images/f4.jpg" />
        <div class="fac-name">Sky Hall</div>
            <div class="fac-name-sub">
            The Sampaguita Hall is a popular venue for intimate gatherings, product launches, conferences, business meetings, and seminars. It has three function halls and one conference room and are fully equipped with LCD TVs, speakers, and sound proof walls and dividers. The conference room is also equipped with state of the art facilities for audio and video conference calls. 
            </div>
</div>  

<div class="col-md-4"  data-aos="fade-up" data-aos-duration="3000">
    <img class="custm-img fac-img" src="images/f5.jpg" />
        <div class="fac-name">Sky Ballroom</div>
            <div class="fac-name-sub">
            Celebrate life’s grandest occasions at Corinthians Hotel. Open the doors to the beautifully designed halls fit for every lavish event you plan to hold. Our 2,000 square meter ballroom offers plenty of space for whatever you dream of. Celebrate your life’s milestones at Corinthians today.
            </div>
</div>  

<div class="col-md-4"  data-aos="fade-left" data-aos-duration="3000">
    <img class="custm-img fac-img" src="images/f6.jpg" />
        <div class="fac-name">Corinthians Theatre</div>
            <div class="fac-name-sub">
            Celebrate life’s grandest occasions at Corinthians Hotel. Open the doors to the beautifully designed halls fit for every lavish event you plan to hold. Our 2,000 square meter ballroom offers plenty of space for whatever you dream of.
            </div>
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

        <div class="row ml-4">
            <a href="contact.php"><button class="custm-contact-btn btn btn-primary mb-4">CONTACT ME!</button></a>
        </div>
    </div>
</div>

<!-- 4TH END -->

<?php include('modals/facilities/facilityModal.php') ?>





    




<?php include('sidebar-footer.php') ?>
