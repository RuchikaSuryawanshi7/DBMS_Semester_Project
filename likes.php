<?php   
session_start();

include("classes/autoloader.php");
  $image_class = new Image();
$login = new Login();
$user_data = $login->check_login($_SESSION['NFoster_userid']);
$USER = $user_data;

//
if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    $profile = new Profile();

$profile_data = $profile->get_profile($_GET['id']);



if(is_array($profile_data))
{
    $user_data = $profile_data[0];

}


}


$Post = new Post();
$likes = false;
$ERROR = "";


if(isset($_GET['id']) && isset($_GET['type']))
{
  $likes = $Post->get_likes($_GET['id'],$_GET['type']);  


}else{
    $ERROR = "No Information was found !";


      }


      //if something was posted
     

      

?>

<html>



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

<body>

    <!-- header area start -->
    <header>
        <div class="header-top sticky bg-white d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <!-- header top navigation start -->
                        <div class="header-top-navigation">
                            <nav>
                                
                            </nav>
                        </div>
                        <!-- header top navigation start -->
                    </div>

                    <div class="col-md-2">
                        <!-- brand logo start -->
                        <div class="brand-logo text-center">
                            <a href="main.php">
                                <img src="assets\images\logo\logo.png" alt="brand logo">
                            </a>
                        </div>
                        <!-- brand logo end -->
                    </div>

                    
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- header area start -->
    <header>
  

    <main>

        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="widget-area">
                            
                            
                        </aside>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2">
                        

                        <div class="card card-small">
                            <div class="share-box-inner">
                              
                                <div class="share-content-box w-100">
                                    <?php
                                    $User = new User();
                                    if(is_array($likes))
                                    {
                                        foreach ($likes as $row) {
                                            $FRIEND_ROW = $User->get_user($row['userid']);
                                            include("my_users.php");
                                            # code...
                                        }
                                    }
                                          

                                    ?>
                                    
                                    
                                   
                                       
                                       
                                      
                                        
                                        

                                       
                                        
                                      
                                </div>
                             
                                <!-- Change profile picture Po-up Ends-->
                                
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