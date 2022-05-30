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
                                    	 echo  htmlspecialchars($ROW_USER['first_name']) . " " .   htmlspecialchars($ROW_USER['last_name']);
 

                                    	  ?>
                              
                                    </h6>
                                    <span class="post-time">35 min ago</span>

                                     <span class="post-time">
                                     <?php echo  htmlspecialchars($ROW['date']); ?>
                                     </span>
                                </div>

                              
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


                              
                                
                            </div>
                        </div>



