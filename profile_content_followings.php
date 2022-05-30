<?php


$image_class = new Image();
$post_class = new Post();
$user_class = new User();
$following = $user_class->get_following($user_data['userid'], "user");
if(is_array($following))
  {
    echo "<br><br>";
    foreach ($following as $follower)
     {
      $FRIEND_ROW = $user_class->get_user($follower['userid']);
      include("my_users.php");


   
        
    }


  }else
        {
             echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
               
               echo "<script> alert('NO following till now!!!..'); </script>";
                echo"</div>";
        }

?>
  