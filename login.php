<?php

session_start();
include("classes/connect.php");
include("classes/login.php");


$email="";
$password="";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = new Login();
    $result = $login->evaluate($_POST);
    if($result !="")
    {
         echo"<div style='background-color: #289fe4;
    color: white;
    padding: 15px;
    border-radius: 5px; text-align:center; font-size: 24px;'>";

        echo $result;  
        echo"</div>";
    }
    else{
        header("Location:profile.php");
        die;
    }

$email=$_POST['email'];
$password=$_POST['password'];


}
?>


<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>N.F - Network Foster</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
    ============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bicon.min.css">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="assets/css/vendor/flaticon.css">
    <!-- audio & video player CSS -->
    <link rel="stylesheet" href="assets/css/plugins/plyr.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="assets/css/plugins/perfect-scrollbar.css">
    <!-- light gallery css -->
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="bg-transparent">

    <main>
        <div class="main-wrapper pb-0 mb-0">
            <div class="timeline-wrapper">
                <div class="timeline-header">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters align-items-center">
                            <div class="col-lg-6">
                                <div class="timeline-logo-area d-flex align-items-center">
                                    <div class="timeline-logo">
                                        <a href="http://localhost/Network_Foster/DBMS_Project/HomePage/">
                                            <img src="assets\images\logo\logo.png" alt="timeline logo">
                                        </a>
                                    </div>
                                    <div class="timeline-tagline">
                                        <h6 class="timeline-bg-title">It’s helps you to connect and share with the people in your life</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-area">
                                    <div class="row align-items-center">
                                        <h4 style="color:white;">New to the Network Foster.. then Sign-up here.</h4>
                                        <div class="col-12 col-sm-auto">
                                           <a href="signup.php"> <button class="login-btn">Sign-Up</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timeline-page-wrapper">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <div class="timeline-bg-content bg-img" data-bg="assets/images/timeline/network_image.jpg">
                                    <h3 class="timeline-bg-title">Let’s see what’s happening to you and your world. Welcome in Student Network Foster.</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center justify-content-center">
                                <div class="signup-form-wrapper">
                                    <h1 class="create-acc text-center">Log-In to your Account</h1>
                                    <div class="signup-inner text-center">
                                        <h3 class="title">Welcome to Student Network Foster</h3>
                                        <form  method="post" action="" class="signup-inner--form">
                                            <div class="row">
                                            
                                                 <div class="col-12">
                                                    <input value="<?php echo $email ?>" name="email" value="<?php echo $email; ?>" type="email" class="single-field" placeholder="Email">
                                                </div>
                                               
                                                 <div class="col-12">
                                                    <input value="<?php echo $password ?>" name="password" type="password" class="single-field" placeholder="Password">
                                                </div>
                                               
                                                
                    
                                                <div class="col-12">
                                                    <button class="submit-btn">Log-in to your Account</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- audio video player JS -->
    <script src="assets/js/plugins/plyr.min.js"></script>
    <!-- perfect scrollbar js -->
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!-- light gallery js -->
    <script src="assets/js/plugins/lightgallery-all.min.js"></script>
    <!-- image loaded js -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- isotope filter js -->
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>



</html>