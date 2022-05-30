 
 <?php
$DB = new Database();
$sql =" select image,postid from posts where is_image = 1 && userid = $user_data[userid] order by id desc limit 30 ";
$images = $DB->read($sql);
$image_class = new Image();
 ?><div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="widget-area profile-sidebar">
                            <!-- widget single item start -->
                            <br>
                            <div class="card widget-item">
                               <a href="profile.php"> <h4 class="widget-title"><?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?></h4></a>
                                <div class="widget-body">
                                    <div class="about-author">
                                        <p><?php echo $user_data['about']?></p>
                                        <ul class="author-into-list">
                                            <li><a href="#"><i class="bi bi-office-bag"></i><?php echo $user_data['field']?></a></li>
                                            <li><a href="#"><i class="bi bi-home"></i><?php echo $user_data['position']?></a></li>
                                            <li><a href="#"><i class="bi bi-location-pointer"></i><?php echo $user_data['country']?></a></li>
                                            <li><a href="#"><i class="bi bi-heart-beat"></i><?php echo $user_data['age']?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item end -->

                           <!-- widget single item start -->
                            <div class="card widget-item">
                               
                                <h4 class="widget-title">My Acquirements</h4>
                                <div class="widget-body">
                                    <div class="sweet-galley img-gallery">
                                        <div class="row row-5">
                                            
                                            <?php
                                                if(is_array($images))
                                                {
                                                    foreach ($images as $image_row) 
                                                    {
                                                        echo "<div class='col-4'>
                                                            <div class='gallery-tem'>
                                                                <figure class='post-thumb'>
                                                                    <a class='gallery-selector' href='$image_row[image]'>";
                                                                       echo "<img src ='" .$image_class->get_thumb_post($image_row['image']) . "' ' />";
                                                                      
                                                                    echo "</a>
                                                                </figure>
                                                            </div>
                                                        </div>";

                                                    }

                                                }
                                                        
                                            ?>
                                            
                                        </div>
                                    </div>
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
                            <div class="card widget-item">
                                <h4 class="widget-title">latest top General news</h4>
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
                                                <h3 class="list-title"><a href="https://www.bbc.com/news/technology-55074383"> Why bots will beat you to in-demand gifts</a></h3>
                                               
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
                                                <h3 class="list-title"><a href="https://www.bbc.com/news/business-54881746">How machine learning is allowing thousands of students to sit exams at home</a></h3>
                                               
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
                                                <h3 class="list-title"><a href="https://www.bbc.com/news/technology-55146206">Netflix content given age rating by algorithm</a></h3>
                                                
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
                                                <h3 class="list-title"><a href="https://deccan.news/microsoft-aicte-to-provide-skilled-students-in-next-technologies/">Microsoft, AICTE to Provide Skilled Students in Next Technologies</a></h3>
                                           
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
                                                <h3 class="list-title"><a href="https://www.thehindu.com/sci-tech/technology/hackers-can-trick-scientists-into-creating-deadly-viruses/article33227446.ece">Hackers can trick scientists into creating deadly viruses</a></h3>
                                              >
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->
                            <!-- widget single item end -->
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

                        <!-- post here -->
                        <div class="card">
                            <!-- All post here -->
                            <?php 
                            if($posts)
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
                        
                    </div>


                    <div class="col-lg-3 order-3">
                        <aside class="widget-area">
                              <!-- widget single item end -->
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
                            <!-- widget single item end -->
                            <!-- widget single item end -->

                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Virtual Grand Tech Event</h4>
                                <div class="widget-body">
                                    <div class="add-thumb">
                                        <a href="https://www.fashiontechco.com/events/">
                                            <img src="image\advertise1.png" alt="advertisement">
                                        </a>
                                    </div>
                                </div>
                            </div>


                           
                       </aside>
                    </div>
                </div>
            </div>
        </div>