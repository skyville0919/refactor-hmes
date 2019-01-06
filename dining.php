<?php include('sidebar-header.php') ?>


<?php 
    if(isset($_SESSION['accounts']) != "") {
        $islogin = "<button type='button' class='btn custm-fac-btn' data-aos='fade-down' data-aos-duration='3000' data-toggle='modal' data-dismiss='modal' data-target='#restaurant-modal'>Get Reservations</button>";
    } else {
        $islogin = $islogin = "<a href='login/'><button type='button' class='btn custm-fac-btn'>Get Reservations, login first!</button></a>";
    }
?>

<div class="ml-4">
    <div class="fac-header" data-aos="fade-right" data-aos-duration="1500">Dining and Restaurants</div>
        <br/>
            <div class="subtitle" data-aos="fade-left" data-aos-duration="2000">
            Experience a whole slew of fine dining restuarants at Corinthians signature food outlets We’ve brought in the best of the world’s culinary scene to bring you a symphony of flavors. Experience the epitome of authentic fine dining in the Philippines.
            </div>

    <br/>
<?php echo $islogin ?>
</div>

<br/>

<div class="row ml-4">

    <div class="col-md-4"  data-aos="fade-right" data-aos-duration="3000">
        <img class="custm-img fac-img" src="images/resto1.jpg" />
            <div class="fac-name">Itallian Steakhouse</div>
                <div class="fac-name-sub">
                Elevate your dining experience at Finestra Italian Steakhouse. Enjoy a superb steak experience that's a cut above the rest!
                </div>
    </div>  

    <div class="col-md-4"  data-aos="fade-down" data-aos-duration="3000">
        <img class="custm-img fac-img" src="images/resto2.jpg" />
            <div class="fac-name">Yakumi</div>
                <div class="fac-name-sub">
                Bringing you a taste of culinary perfection in the art of Japanese cuisine, we have dared to combine  traditional and modern techniques of Japanese cooking to give an exciting and unique taste to your favorite dishes.
                </div>
    </div>  

    <div class="col-md-4"  data-aos="fade-left" data-aos-duration="3000">
        <img class="custm-img fac-img" src="images/resto3.jpg" />
            <div class="fac-name">Corinthians Lounge</div>
                <div class="fac-name-sub">
                Corinthians Lounge is ideal for casual dining, aperitifs, post-dinner nightcaps, or leisure meetings with friends. It also serves lavish Filipino Afternoon Tea that offers Filipino native delicacies served with coffee or green tea.
                </div>
    </div> 
    
</div>

<div class="row ml-4 mt-4">
<div class="col-md-4"  data-aos="fade-right" data-aos-duration="3000">
    <img class="custm-img fac-img" src="images/resto4.jpg" />
        <div class="fac-name">The Grill</div>
            <div class="fac-name-sub">
            The Grill guests will delight not only in our signature steak dishes but also the tableside preparations as performed by our service team.
            </div>
</div>  

<div class="col-md-4"  data-aos="fade-up" data-aos-duration="3000">
    <img class="custm-img fac-img" src="images/resto5.jpg" />
        <div class="fac-name">Dragon Bar</div>
            <div class="fac-name-sub">
            We make it a point to bring opulence to greater heights for you to have the best in every experience here at Solaire. Take time to enjoy our little pocket of serenity in luxury at the Dragon Bar.  
			It's the perfect nook to relax, have a drink and lounge in luxury and style.
            </div>
</div>  

<div class="col-md-4"  data-aos="fade-left" data-aos-duration="3000">
    <img class="custm-img fac-img" src="images/resto6.jpg" />
        <div class="fac-name">Corinthians Foodcourt</div>
            <div class="fac-name-sub">
            Experience culinary delight by dining at one of the finest food courts in the country. 
		    We guarantee a wide selection of your favorite international dishes.
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

<?php include('modals/dining/restaurantModal.php') ?>

    




<?php include('sidebar-footer.php') ?>
