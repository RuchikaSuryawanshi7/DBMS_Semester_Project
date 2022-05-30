<?php

$DB = new Database();
$sql =" select image,postid from posts where is_image = 1 && userid = $user_data[userid] order by id desc limit 30 ";
$images = $DB->read($sql);
$image_class = new Image();
if(is_array($images))
  {
    echo "<br><br>";
  	foreach ($images as $image_row) {
      echo "<a href='single_post.php?id=$image_row[postid]'>";


  	echo "<img src ='" .$image_class->get_thumb_post($image_row['image']) . "' style= 'width:150px; margin:10px;' />";
    echo "</a>";
  		
  	}


  }else
        {
        	 echo"<div style='text-align:center; font-size: 12px; color:black; backgroud-color:blue;'>";
               
                echo "NO Images posted till now!!";  
                echo"</div>";
        }

?>
  