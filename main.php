<?php
session_start();

//print_r();
include("classes/autoloader.php");



//isset($_SESSION['NFoster_userid'];
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
 if($_SERVER['REQUEST_METHOD'] == "POST")
   {
    
    $post = new Post();
    
    $id = $_SESSION['NFoster_userid'];
    $result = $post->create_post($id, $_POST,$_FILES);
    if($result == "")
    {
        header("Location: main.php");
        die;

    }else
    {
         echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
        echo "<br>Following Errors are occures<br>";
        echo $result;  
        echo"</div>";
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
        <?php
        include("header.php");  
        ?>
    </header>
    <!-- header area end -->

    <main>

        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="widget-area">
                            <!-- widget single item start -->
                            <div class="card card-profile widget-item p-0">
                                <div class="profile-banner">
                                    <figure class="profile-banner-small">
                                       <!-- come here for cover image -->


                                    <?php 
                                    $image = "assets/images/banner/profile-banner_NF.jpg";

                                    if(file_exists($user_data['cover_image']))
                                    {
                                        $image =$image_class->get_thumb_cover($user_data['cover_image']);

                                    }
                                    



                                    ?>
                                        <a href="profile.html">
                                            <img src="<?php echo $image; ?>" alt="">
                                        </a>


                                         <?php 
                                    $image = "image/male.jpg";
                                    if($user_data['gender'] == "Female")
                                    {
                                        $image = "image/female.jpg";
                                    }
                                    if(file_exists($user_data['profile_image']))
                                    {
                                        $image =  $image_class->get_thumb_profile($user_data['profile_image']);
                                    }



                                    ?>
                                    <a href="profile.php" class="profile-thumb-2">
                                        <img src="<?php echo $image; ?>" alt="profile picture">
                                    </a>
                                    </figure>
                                    <div class="profile-desc text-center">
                                        <h6 class="author"><a href="profile.php"><?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?></a></h6>
                                        <p><?php echo $user_data['description']?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item start -->

                            <!-- widget single item start -->
                            

                             <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Virtual Tech Event</h4>
                                <div class="widget-body">
                                    <div class="add-thumb">
                                        <a href="https://youthforseva.org/event-3911933">
                                            <img src="image\advertise3.jpg" alt="advertisement">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item end -->
                           <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">latest top news</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                   
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2020/11/digital-technology-on-the-cutting-edge/">Digital technology on the cutting edge</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                   <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2020/02/modelled-in-the-virtual-world/">Modelled in the virtual world</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                   <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2019/09/ai-supports-agile-working-methods/">AI supports agile working methods</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                  <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2017/05/will-your-next-colleague-be-a-smart-robot/">Will your next colleague be a smart robot?</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                   <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2019/11/5g-is-finally-here-this-is-what-you-need-to-know/">5G is finally here – This is what you need to know</a></h3>
                                                
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2">
                        <!-- share box start -->
                        <div class="card card-small">
                            <div class="share-box-inner">
                                <!-- profile picture end -->
                               <div class="profile-thumb">
                                    <a href="#">
                                        <?php
                                            $profile_image  = " ";
                                            if($user_data['gender'] == "Male")
                                            {
                                                $profile_image = "image/male.jpg";

                                            }elseif ($user_data['gender'] == "Female")
                                             {
                                                $profile_image = "image/female.jpg";
                                            }else
                                            {
                                                $profile_image = "image/male.jpg";

                                            }
                                            if(file_exists($user_data['profile_image']))
                                            {
                                                $profile_image = $image_class->get_thumb_profile($user_data['profile_image']);

                                            }
                                            
                                        
                                       ?>
                                        <figure class="profile-thumb-middle">
                                            <img src="<?php echo $profile_image; ?>" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <!-- share content box start -->
                                <div class="share-content-box w-100">
                                    <form method="post" action = " " enctype = "multipart/form-data" class="share-text-box">
                                        <textarea name="post" class="share-text-field" aria-disabled="true" placeholder="Say Something" data-toggle="modal" data-target="#textbox" id="email"></textarea>

                                        <br><input type="file" name="file"><br><br><br><br>
                                        
                                        <button class="btn-share" type="submit">share</button>

                                    </form>
                                </div>
                                <!-- share content box end -->
                                <!-- Modal start -->
                                  <form method = "post"  action = " " enctype = "multipart/form-data" class="share-text-box">
                                <div class="modal fade" id="textbox" aria-labelledby="textbox">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Share Your ThoughtsS</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                          
                                            <div class="modal-body custom-scroll">
                                                <textarea name="post" class="share-field-big custom-scroll" placeholder="Say Something"></textarea>
                                               
                                            </div>
                                            
                                            <input type="file" name="file">
                                       
                                            <div class="modal-footer">
                                                <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                                                <button type="submit" class="post-share-btn" value="Post" >post</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal end -->
                            </div>
                        </div>
                        <!-- share box end -->


                        <!-- post status start -->
                        <div class="card">
                            <?php
                            $DB = new Database();
                            $user_class = new User();
                            $image_class = new Image();
                            $followers = $user_class->get_following($_SESSION['NFoster_userid'], "user");
                            $follower_ids = false;
                            if(is_array($followers))
                            {
                                $follower_ids = array_column($followers, "userid");
                                $follower_ids = implode("','", $follower_ids);
                            }
                            if($follower_ids)
                            {
                                $myuserid = $_SESSION['NFoster_userid'];
                                $sql = "select * from posts where parent = 0 and userid = '$myuserid' || userid in('" .$follower_ids. "') order by id desc limit 30 ";
                                $posts = $DB->read($sql);
                            }
                            
                            if(isset($posts) && $posts)
                            {
                                foreach ($posts as $ROW)
                                {
                                    $user = new User();
                                    $ROW_USER = $user->get_user($ROW['userid']);
                                    //print_r($ROW);
                                    
                                    include("post.php");

                                }
                            }

                            ?>

                            
                        </div>
                        <!-- post status end -->

                    </div>

                    <div class="col-lg-3 order-3">
                        <aside class="widget-area">
                                 <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">latest top news</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                   
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2020/11/digital-technology-on-the-cutting-edge/">Digital technology on the cutting edge</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                   <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2020/02/modelled-in-the-virtual-world/">Modelled in the virtual world</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                   <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2019/09/ai-supports-agile-working-methods/">AI supports agile working methods</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                  <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2017/05/will-your-next-colleague-be-a-smart-robot/">Will your next colleague be a smart robot?</a></h3>
                                                
                                            </div>
                                        </li>
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                   <figure class="profile-thumb-small">
                                                        <img src="image\news-icon-22.png" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="https://www.home.sandvik/en/stories/articles/2019/11/5g-is-finally-here-this-is-what-you-need-to-know/">5G is finally here – This is what you need to know</a></h3>
                                                
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->

                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Virtual Ideathon Event</h4>
                                <div class="widget-body">
                                    <div class="add-thumb">
                                        <a href="https://site.ieee.org/sb-ritb/wealth-from-waste/">
                                            <img src="image\advertise2.png" alt="advertisement">
                                        </a>
                                    </div>
                                </div>
                            </div>


                           <!-- widget single item start -->
                            
                            <!-- widget single item end -->
                        </aside>
                    </div>
                </div>
            </div>
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



</html>