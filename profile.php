<?php

session_start();


include("classes/autoloader.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['NFoster_userid']);
$USER = $user_data;
//image class object created

$image_class = new Image();

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





 //posting code
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
     if(isset($_POST['first_name']))
     {
        $settings_class = new Settings();
        $settings_class->save_settings($_POST,$_SESSION['NFoster_userid']);

     }else
     {
         $post = new Post();
    
    $id = $_SESSION['NFoster_userid'];
    $result = $post->create_post($id, $_POST,$_FILES);
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
    
   

    
   }
   //collect post
    $post = new Post();
    //$id = $_SESSION['NFoster_userid'];
    $id = $user_data['userid'];
    $posts = $post->get_posts($id);
   


    //collect friends
    $user = new User();
    
    $friends = $user->get_friends($id);
    //image Class
    $image_class = new Image();

     //collect mentors
    $user = new User();
    //$id = $_SESSION['NFoster_userid'];
    $mentors = $user->get_mentors($id);
    //image Class
    $image_class = new Image();









?>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> N.F - Network Foster</title>
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
   

    <main>

        <div class="main-wrapper">



                                    <?php 
                                    $image = "assets/images/banner/profile-banner_NF.jpg";

                                    if(file_exists($user_data['cover_image']))
                                    {
                                        $image =$image_class->get_thumb_cover($user_data['cover_image']);

                                    }
                                    



                                    ?>
            

            <div class="profile-banner-large bg-img">
                <img src="<?php echo $image; ?>" width="100%" height="100%" alt="cover picture">
                 

            </div>
            <div class="profile-menu-area bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="profile-picture-box">

                                <figure class="profile-picture">
                                    <?php 
                                    $image = "image/male.jpg";
                                    if($user_data['gender'] == "Female")
                                    {
                                        $image = "assets/images/gender/female.jpg";
                                    }
                                    if(file_exists($user_data['profile_image']))
                                    {
                                        $image =  $image_class->get_thumb_profile($user_data['profile_image']);
                                    }



                                    ?>
                                    <a href="profile.php">
                                        <img src="<?php echo $image; ?>" alt="profile picture">
                                    </a>
                                </figure>
                                <br>
                                

                               <a href="change_profile_image.php?change=profile"> 

                                <button class="edit-btn"><?php echo " "." "." ";?> Change Profile Picture</button><br></a> 
                              
                               </div>



                        </div>


                        <div class="col-lg-6 col-md-6 offset-lg-1">
                            <div class="profile-menu-wrapper">

                                <div class="main-menu-inner header-top-navigation">
                                    <a href="change_profile_image.php?change=cover"> 
                                         <?php echo "<br>";?>
                                 <button class="edit-btn">Change Cover Picture</button>
                                </a>   

                                    <nav>
                                        <ul class="main-menu">

                                            <li class="active"><a href="main.php">My Network</a></li>
                                            <li><a href="profile.php?section=about&id=<?php echo $user_data['userid']?>">About me</a></li>
                                            <!--<li><a href="profile.php?section=photos&id=<?php echo $user_data['userid']?>">photos</a></li>-->
                                            <li><a href="profile.php?section=followings&id=<?php echo $user_data['userid']?>">Following</a></li>
                                            <li><a href="profile.php?section=followers&id=<?php echo $user_data['userid']?>">Followers</a></li>
                                            <li><a href="profile.php?section=friends&id=<?php echo $user_data['userid']?>">Find Students</a></li>
                                            <li><a href="profile.php?section=mentors&id=<?php echo $user_data['userid']?>">Find Mentors</a></li>
                                            
                                            <?php
                                            if($user_data['userid'] == $_SESSION['NFoster_userid'])
                                                {
                                                    echo '<li><a href="profile.php?section=settings&id= ' .$user_data['userid'] . '">Update Profile</a></li>';

                                                }

                                              

                                            ?>
                                            
                                        <li class="d-inline-block d-md-none"><a href="profile.html">edit profile</a></li> 
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 d-none d-md-block">
                            <?php
                            $mylikes = "";
                            if($user_data['likes'] > 0)
                            {
                                $mylikes = "(" . $user_data['likes'] . "Followers)";

                            }
                            ?>
                            <div class="profile-edit-panel">
                               <a href="like.php?type=user&id=<?php echo $user_data['userid'] ?>">  <input type="button" class="edit-btn" value="Follow <?php echo $mylikes ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <?php
           $section = "default";
           if(isset($_GET['section']))
           {
            $section = $_GET['section'];
           }
           if($section == "default")
           {
             include("profile_content_default.php");

           }elseif ($section == "photos") 
           {
            echo "<br><br>";
            include("profile_content_photos.php");

            
           }elseif($section == "followers")
           {
            echo "<br><br>";
            include("profile_content_followers.php");

           }
           elseif($section == "followings")
           {
            echo "<br><br>";
            include("profile_content_followings.php");

           }
           elseif($section == "settings")
           {
            echo "<br><br>";
            include("profile_content_settings.php");

           }
           elseif($section == "about")
           {
            echo "<br><br>";
            include("profile_content_about.php");

           }
            elseif($section == "mentors")
           {
            echo "<br><br>";
            include("profile_content_mentors.php");

           }
           elseif($section == "friends")
           {
            echo "<br><br>";
            include("profile_content_friends.php");

           }
           
          

           ?>

    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    
    <!-- footer area end -->
    <!-- footer area start -->
    
    <!-- footer area end -->

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