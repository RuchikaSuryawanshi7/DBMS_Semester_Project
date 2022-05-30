<div style="min-height: 400px; width: 100%; background-color: white; text-align: center;">
  <div style="padding: 20px; max-width: 450px; display: inline-block;">


<form  method="post" action="" class="share-text-box">
                                           
                                            
                                                
                                                
                                                   
                                               
    <?php

    $settings_class = new Settings();
    $Settings = $settings_class->get_settings($_SESSION['NFoster_userid']);
    if(is_array($Settings))
    {

      
         echo "<h5>About me </h5>";
         echo "<div class='share-field-big custom-scroll' >".htmlspecialchars($Settings['about'])."</div> ";
        


    }

   



    ?>
     
        
       
    </form>


  </div>
</div>


  