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
    <link rel="stylesheet" href="css/animete.css">


    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="bootstrap/css/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="fontawesome/css/all.css">

    <!-- Font Awesome JS -->
    <script defer src="bootstrap/js/solid.js"></script>
    <script defer src="bootstrap/js/fontawesome.js"></script>

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
                <li class="active"><a href="index.php">FACILITIES</a></li>
                <li class="active"><a href="index.php">AMENITIES</a></li>
                <li class="active"><a href="index.php">DINING & RESTAURANTS</a></li>
                <li class="active"><a href="index.php">ABOUT</a></li>
                <li class="active"><a href="index.php">CONTACT</a></li> 
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
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-danger custm-btn d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="bootstrap/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="bootstrap/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
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
        });
    </script>
</body>

</html>