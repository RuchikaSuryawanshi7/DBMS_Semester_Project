<div class="col-lg-3 col-sm-6 recently request">
                                                <div class="friend-list-view">
                                                    <!-- profile picture end -->
                                                    
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <a href="profile.php">
                                                            <figure class="profile-thumb-middle">
                                                                     <?php
                                            $image  = " ";
                                            if($FRIEND_ROW['gender'] == "Male")
                                            {
                                                $image = "image/male.jpg";

                                            }elseif ($FRIEND_ROW['gender'] == "Female")
                                             {
                                                $image = "image/female.jpg";
                                            }else
                                            {
                                                $image = "image/male.jpg";

                                            }
                                            if(file_exists($FRIEND_ROW['profile_image']))
                                            {
                                                $image = $image_class->get_thumb_profile($FRIEND_ROW['profile_image']);

                                            }
                                            
                                        
                                       ?>
                                                                <img src="<?php echo $image; ?>">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <div class="posted-author">
                                                        <h6 class="author"><a href="profile.php?id=<?php echo $FRIEND_ROW['userid'];?>"><?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name'];
                                                        echo "<br><br>";
                                                        echo $FRIEND_ROW['field'];
                                                              ?></a></h6>
                                                        <!--<button class="add-frnd">add friend</button>-->
                                                    </div>
                                                </div>
</div>