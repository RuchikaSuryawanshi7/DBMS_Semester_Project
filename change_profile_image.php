<?php   
session_start();

//print_r();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/image.php");
//isset($_SESSION['NFoster_userid'];
$login = new Login();
$user_data = $login->check_login($_SESSION['NFoster_userid']);


 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") 
   {
      
      if($_FILES['file']['type'] == "image/jpeg")
      {
        $allowed_size = (1024 * 1024) * 7;
        if($_FILES['file']['size'] < $allowed_size)
        {
            //fine 
            $folder = "uploads/" . $user_data['userid'] . "/";
            //create folder
            if(!file_exists($folder))
            {
                mkdir($folder, 0777, true);
            } 
            $image = new Image();
            $filename = $folder . $image->generate_filename(15) . ".jpg";

            move_uploaded_file($_FILES['file']['tmp_name'], $filename);
             $change = "profile";
                        if(isset($_GET['change']))
                        {
                            //check for mode
                            $change =  $_GET['change'];

                        }
            
            if($change == "cover")
                        {
                           
                           if(file_exists($user_data['cover_image']))
                           {
                            unlink($user_data['cover_image']);
                           }

                            $image->resize_image($filename,$filename,1500,1500);
                        }
                        else
                        {
                             if(file_exists($user_data['profile_image']))
                           {
                            unlink($user_data['profile_image']);
                           }
                            $image->crop_image($filename,$filename,1500,1500);
                        }
            

                if(file_exists($filename))
                    {
                        $userid = $user_data['userid'];
                       if($change == "cover")
                        {
                            $query = "update users set cover_image = '$filename' where userid = '$userid' limit 1 ";
                        }else
                        {
                            $query = "update users set profile_image = '$filename' where userid = '$userid' limit 1 ";
                        }
                        
                        $DB = new Database();
                        $DB->save($query);
                        header("Location: profile.php");
                        die;
                    }


        }else
        { //echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
        //echo "<br>Following Errors are occures<br>";
        //echo "Please enter Image of a size 7mb or Lower are allowed !"; 
        //echo"</div>";
        echo "<script> alert('Please enter Image of a size 7mb or Lower are allowed !'); </script>";

        }

      }else
      {
        //echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
        //echo "<br>Following Errors are occures<br>";
        //echo "Please enter only jpeg type Image!"; 
        //echo"</div>";
         echo "<script> alert('Please enter only jpeg type Image!'); </script>";
      }
   
    
   }else
   {

    // echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
        //echo "<br>Following Errors are occures<br>";
        //echo "Please enter a valid Image!"; 
    echo "<script> alert('Please enter a valid Image!'); </script>";
        //echo"</div>";
   }
    
  
 }
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
   
    <!-- header area end -->

    <main>

        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="widget-area">
                            
                            
                        </aside>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2">
                        <!-- share box start -->




                          <!-- Change profile picture starts-->


                        <div class="card card-small">
                            <div class="share-box-inner">
                              
                                <div class="share-content-box w-100">
                                    <form method = "post" enctype="multipart/form-data" class = "share-text-box">
                                        <input type="file" name="file">

                                        <input type="submit" value = "Change" class ="btn-share">
                                       <br><br>
                                        <?php
                                        $change = "profile";
                                     if(isset($_GET['change']) && $_GET['change'] == "cover")
                                         {
                                                        //check for mode
                                             $change = "cover";
                                             echo "<img src = '$user_data[cover_image]' >  ";

                                            }else
                                            {
                                                echo "<img src = '$user_data[profile_image]' > ";

                                            }
                                         
                                         
                                        ?>
                                        </form>
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