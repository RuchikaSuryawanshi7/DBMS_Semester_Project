<div class="col-lg-3 col-sm-6 recently request">
                                                <div class="friend-list-view">
                                                    <!-- profile picture end -->
                                                    
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <a href="profile.php">
                                                            <figure class="profile-thumb-middle">
                                                                     <?php
                                            $image  = " ";
                                            if($MENTOR_ROW['gender'] == "Male")
                                            {
                                                $image = "image/male.jpg";

                                            }elseif ($MENTOR_ROW['gender'] == "Female")
                                             {
                                                $image = "image/female.jpg";
                                            }else
                                            {
                                                $image = "image/male.jpg";

                                            }
                                            if(file_exists($MENTOR_ROW['profile_image']))
                                            {
                                                $image = $image_class->get_thumb_profile($MENTOR_ROW['profile_image']);

                                            }
                                            
                                        
                                       ?>
                                                                <img src="<?php echo $image; ?>">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <div class="posted-author">
                                                        <h6 class="author"><a href="profile.php?id=<?php echo $MENTOR_ROW['userid'];?>"><?php echo $MENTOR_ROW['first_name'] . " " . $MENTOR_ROW['last_name'];
                                                        echo "<br><br>";
                                                        echo $MENTOR_ROW['field']; 


                                                        ?></a></h6>

                                                       
                                                    </div>
                                                </div>
</div>