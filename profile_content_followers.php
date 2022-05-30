<?php


$image_class = new Image();
$post_class = new Post();
$user_class = new User();
$followers = $post_class->get_likes($user_data['userid'], "user");
if(is_array($followers))
  {
    echo "<br><br>";
    foreach ($followers as $follower)
     {
      $FRIEND_ROW = $user_class->get_user($follower['userid']);
      include("my_users.php");


   
        
    }


  }else
        {
             echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
               
                echo "NO followers till now!!";  
                echo "<script> alert('NO followers till now!'); </script>";
                echo"</div>";
        }

?>
  