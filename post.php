<div class="card">
                            <!-- post title start -->
                            <div class="post-title d-flex align-items-center">
                                <!-- profile picture end -->
                                <div class="profile-thumb">

                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <?php
                                            $profile_image  = " ";
                                            if($ROW_USER['gender'] == "Male")
                                            {
                                                $profile_image = "image/male.jpg";

                                            }elseif ($ROW_USER['gender'] == "Female")
                                             {
                                                $profile_image = "image/female.jpg";
                                            }else
                                            {
                                                $profile_image = "image/male.jpg";

                                            }
                                            if(file_exists($ROW_USER['profile_image']))
                                            {
                                                $profile_image = $image_class->get_thumb_profile($ROW_USER['profile_image']);

                                            }
                                            
                                        
                                       ?>
                                            <img src="<?php echo $profile_image; ?>">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <div class="posted-author">
                                    <h6 class="author">
                                        <?php 

                                         //echo "Karishma Suryawanshi";
                                        echo "<a href ='profile.php?type=post&id=$ROW[userid]' >";
                                         echo  htmlspecialchars($ROW_USER['first_name']) . " " .   htmlspecialchars($ROW_USER['last_name']);
                                         echo "</a>";
 

                                          ?>
                              
                                    </h6>
                                    

                                     <span class="post-time">
                                     <?php echo Time::get_time($ROW['date']); ?>
                                     </span>
                                </div>

                                <?php
                                $post = new Post();

                                if($post->i_own_post($ROW['postid'], $_SESSION['NFoster_userid']))
                                {
                                echo "<div class='post-settings-bar'>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class='post-settings arrow-shape'>
                                        <ul>
                                            
                                            <li><a href='edit.php?id= $ROW[postid]'><button>edit</button></a></li>
                                            <li><a href='delete.php?id= $ROW[postid]'><button>delete</button></a></li>
                                        </ul>
                                    </div>
                                </div>";
                               }
                                 ?>
                            </div>
                            <!-- post title start -->
                            <div class="post-content">
                                <p class="post-desc">
                                   <?php 
                                   echo htmlspecialchars($ROW['post']);



                                   ?>
                                </p>
                                <?php
                                if(file_exists($ROW['image']))

                                {
                                    $post_image = $image_class->get_thumb_post($ROW['image']);
                                    echo "<img src = '$post_image' style ='width:90%;' align:'center'; />";
                                    
                                     

                                }

                                ?>

                                <?php
                                $i_liked = false;

                                if(isset($_SESSION['NFoster_userid']))
                                {
                                    echo "<br>";
                                    


                                $DB = new Database();
                                  $sql ="select likes from likes where type = 'post' && contentid = '$ROW[postid]' limit 1";
                                       $result = $DB->read($sql);
                                       if(is_array($result))
                                       {
                                        $likes = json_decode($result[0]['likes'],true);
                                        $user_ids = array_column($likes, "userid");
                                        if(in_array($_SESSION['NFoster_userid'], $user_ids))
                                            {
                                                $i_liked = true;

                                            }
                                       }
                                if($ROW['likes'] > 0)
                                {
                                    echo "<br>";
                                    echo "<a href= 'likes.php?type=post&id=$ROW[postid]' >";
                                    if($ROW['likes'] == 1)
                                    {
                                        if($i_liked)
                                        {
                                            echo "<div> you liked this post </div>" ;

                                        }else
                                        {
                                             echo "<div> 1 person likes this post </div>" ;

                                        }
                                       
                                        
                                    }else
                                    {
                                        if($i_liked)
                                        {
                                            $text = "others";
                                            if($ROW['likes'] - 1 == 1)
                                            {
                                                $text = "other";
                                                

                                            }
                                            echo "<div>you and " . $ROW['likes'] ." $text liked this post </div>" ;
                                        }else
                                        {
                                             echo "<div>" . $ROW['likes'] . "$text liked this post </div>" ;
                                            

                                        }
                                       

                                    }
                                    echo "</a>";
                                }
                            }



                                ?>





                                

                                <?php
                                $likes = "";
                                $likes = ($ROW['likes'] > 0) ? $ROW['likes'] : "" ;
                                ?> 


                              
                                <div class="post-meta">




                                    <a href="like.php?type=post&id=<?php echo $ROW['postid'];?>"><button class="post-meta-like">
                                       
                                        <span> <?php echo $likes . " " ; ?><i class="bi bi-heart-beat"></i></span>
                                        
                                    </button></a>
                                    <?php
                                    if($ROW['is_image'])
                                    {
                                       echo "<a href='image_view.php?type=post&id=$ROW[postid]'>";
                                       echo "<button class='post-share'>
                                               <span>View full image</span>
                                            </button>"; 
                                            echo "</a>";
                                    }

                                    ?>
                                    <?php
                                    $comments = "";
                                    if($ROW['comments'] > 0)
                                    {
                                        $comments = " " . $ROW['comments'] . " ";
                                    }



                                    ?>
                                    
                                    <ul class="comment-share-meta">
                                        <li><a href="single_post.php?type=post&id=<?php echo $ROW['postid']; ?>">
                                            <button class="post-comment">
                                                <?php echo $comments; ?><i class="bi bi-chat-bubble"></i>
                                            </button></a>
                                        </li>
                                       <!-- <li>
                                            <button class="post-share">
                                                <i class="bi bi-share"></i>
                                                <span>07</span>
                                            </button>
                                        </li>-->
                                    </ul>

                                </div>
                            </div>
                        </div>



