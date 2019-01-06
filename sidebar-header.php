<?php session_start(); ?>
<?php include('conn.php') ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HMES</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="customcss/sidebar.css">
    <link rel="stylesheet" href="customcss/transition.css">
    <link rel="stylesheet" href="customcss/suites.css">
    <link rel="stylesheet" href="customcss/facilities.css">
    <link rel="stylesheet" href="customcss/about.css">
    <link rel="stylesheet" href="customcss/modal.css">





	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">


    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="bootstrap/css/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="fontawesome/css/all.css">

    <!-- Font Awesome JS -->
    <script defer src="bootstrap/js/solid.js"></script>
    <script defer src="bootstrap/js/fontawesome.js"></script>

    <script src="js/jquery.min.js"></script>

    <!-- AOS -->
    <link href="plugins/aos/aos.css" rel="stylesheet">


  


    <link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="bootstrap/css/fixedHeader.bootstrap4.min.css">





    <!-- DATATABLES -->
  

  


 

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>
            <ul class="list-unstyled components">
            <h1 id="colorlib-logo"><a href="index.php"><img src="images/logo.png" width="155" height="155"></a></h1>
                <li class="active"><a href="index.php">HOME</a></li>
                <li class="active"><a href="suites.php">ROOM & SUITES</a></li>
                <li class="active"><a href="facilities.php">FACILITIES</a></li>
                <li class="active"><a href="amenities.php">AMENITIES</a></li>
                <li class="active"><a href="dining.php">DINING & RESTAURANTS</a></li>
                <li class="active"><a href="about.php">ABOUT</a></li>
            </ul>

            <ul class="list-unstyled">
                
                    <small>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="index.html" target="_blank">Corinthnians Hotel</a></small>

                    <br/>
                    <br/>

                    <a class="custm-link" href="#"><i class="fab fa-facebook-square"></i></a>
                    <a class="custm-link" href="#"><i class="fab fa-twitter-square"></i></a>
                    <a class="custm-link" href="#"><i class="fab fa-instagram"></i></a>
                
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-bars"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-danger custm-btn d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                   <?php 
                    if(isset($_SESSION['accounts']) == "") {
                        ?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="login/"><button class="btn custm-btn">LOGIN</button></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="login/signup.php"><button class="btn custm-btn">SIGNUP</button></a>
                            </li>
                        </ul>
                    </div>
                        <?php
                    } else {
                        ?> 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <?php 
                                $query = "SELECT * FROM accounts WHERE Acc_ID=".$_SESSION['accounts'];
                                $result = mysqli_query($db,$query);
                                if(mysqli_num_rows($result) > 0) {
                                    while($row=mysqli_fetch_array($result)) {
                                        ?> 
                                             <li class="nav-item active">
                                                <label class="nav-link">Welcome, <?php echo $row['F_Name']."!" ?> </label>
                                            </li>
                                        <?php
                                    }
                                }
                            ?>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                        <?php
                    }
                    ?>

                   
                    

                </div>
            </nav>
        