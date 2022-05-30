<?php




$login = new Login();

$user_data = $login->check_login($_SESSION['NFoster_userid']);
 //posting code
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
    
    $post = new Post();
    
    $id = $_SESSION['NFoster_userid'];
    $result = $post->create_post($id, $_POST);
    if($result == "")
    {
        header("Location: profile.php");
        die;

    }else
    {
         echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
        echo "<br>Following Errors are occures<br>";
        echo $result;  
        echo"</div>";
    }

    
   }
  
    //collect mentors
    $user = new User();
    //$id = $_SESSION['NFoster_userid'];
    $mentors = $user->get_mentors($id);
    //image Class
    $image_class = new Image();








?>

<html>



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adda - Social Network HTML Template</title>
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
        <?php
        include("header.php");

        ?>
       


    </header>
    <!-- header area end -->
    <!-- header area start -->
   
    <!-- header area end -->

    <main>

        <div class="main-wrapper">
          
            
            <!-- sendary menu end -->

            <!-- photo section start -->
            <div class="friends-section mt-20">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content-box friends-zone">
                                <div class="row mt--20 friends-list">
                                     <?php 
                            if($mentors)
                            {
                                foreach ($mentors as $MENTOR_ROW)
                                {
                                   
                                    //print_r($ROW);
                                    
                                    include("all_mentor.php");

                                }
                            }
                            else
                            {
                                echo "NO Mentors Found !!";
                            }


                            ?>
             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- photo section end -->
        </div>

    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
    <!-- Scroll to Top End -->

   

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


<!-- Mirrored from demo.hasthemes.com/adda-preview/adda/friends.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Nov 2020 19:18:47 GMT -->
</html>