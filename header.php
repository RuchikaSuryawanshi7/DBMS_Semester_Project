
<?php


?><div class="header-top sticky bg-white d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <!-- header top navigation start -->
                        <div class="header-top-navigation">
                            <nav>
                                <ul>
                                    <!--<li class="active"><a href="main.php">home</a></li>-->
                                    <li class="active"><a href="#">N.F ( World's 1st Social platform for students and mentors )</a></li>
                                    
                                   
                               
                                        
                                    </li>
                                </ul>
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

                    <div class="col-md-5">
                        <div class="header-top-right d-flex align-items-center justify-content-end">
                            <!-- header top search start -->
                            <div class="header-top-search">
                                <form method="get" action="search.php" class="top-search-box">
                                    <input type="text" placeholder="Search" name='find' class="top-search-field">
                                    <button type ="submit" class="top-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            <!-- header top search end -->

                            <!-- profile picture start -->
                            <div class="profile-setting-box">
                                <div class="profile-thumb-small">
                                	<?php
                                	$corner_image = "image/male.jpg";

                                     if(isset($USER))
                                        {
                                             if(file_exists($USER['profile_image']))
                                            
                                              {
                                                    $image_class = new Image();
                                            		$corner_image = $image_class->get_thumb_profile($USER['profile_image']);
                                            	}else
                                                    {
                                                        if($USER['gender'] == "Female")
                                                        {
                                                            $corner_image = "image/female.jpg";
                                                        }
                                                    }
                                         }   

                                	?>
                                    <a href="javascript:void(0)" class="profile-triger">
                                        <figure>
                                            <img src="<?php echo $corner_image; ?>" alt="profile picture">
                                        </figure>
                                    </a>
                                    <div class="profile-dropdown">
                                        <div class="profile-head">
                                            <a href="profile.php"><h5 class="name"><?php echo $USER['first_name'] . " " . $USER['last_name'] ?></h5></a>
                                            <a class="mail" href="#"><?php echo $USER['email'] ?></a>
                                        </div>
                                        <div class="profile-body">
                                            <ul>
                                                <li><a href="profile.php"><i class="flaticon-user"></i>Profile</a></li>
                                                
                                                <li><a href="main.php"><i class="flaticon-document"></i>My Network</a></li>
                                            </ul>
                                            <ul>
                                               
                                                <li><a href="logout.php"><i class="flaticon-unlock"></i>Sign out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- profile picture end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>