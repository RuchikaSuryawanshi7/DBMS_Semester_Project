<div style="min-height: 400px; width: 100%; background-color: white; text-align: center;">
  <div style="padding: 10px; max-width: 750px; display: inline-block;">


<form  method="post" action="" class="share-text-box">
                                           
                                            
                                                
                                                
                                                   
                                               
    <?php

    $settings_class = new Settings();
    $Settings = $settings_class->get_settings($_SESSION['NFoster_userid']);
    if(is_array($Settings))
    {
        echo "<br>";

       echo "<input type = 'text' class= 'col-md-6' name = 'first_name' value ='".htmlspecialchars($Settings['first_name'])."' placeholder = 'First name' />";
    //\echo " ". " | "." ";
    echo "<input type = 'text' class= 'col-md-6' name = 'last_name' value ='".htmlspecialchars($Settings['last_name'])."' placeholder = 'Last name' />";
    echo "<br><br>";
    echo "<input type = 'text' class= 'col-12' name = 'email' value ='".htmlspecialchars($Settings['email'])."' placeholder = 'Email' />";
    echo "<br><br>"; //echo " ". " "." ";
    echo "<input type = 'password' class= 'col-12' name = 'password' value ='".htmlspecialchars($Settings['password'])."' placeholder = 'Password' />";
    echo "<br><br>";
    echo "<input type = 'password' class= 'col-12' name = 'password2' value ='".htmlspecialchars($Settings['password'])."' placeholder = 'Password' />";
    echo "<br><br>";
    echo "  <select  name='gender' class='col-md-6' >
                                                    <option>".htmlspecialchars($Settings['gender'])."</option>
                                                        <option>Male</option>
                                                        <option >Female</option>
                                                        <option >Other's</option>
                                                    </select> ";
    echo " ". "  "." ";
     echo "<input type = 'text' class= 'col-md-6' name = 'age' value ='".htmlspecialchars($Settings['age'])."' placeholder = 'Age' />";
     echo "<br><br><br>";

    
     echo "<select name='position' placeholder='Position' class='nice-select' name='sortby'>
                                                       <option>".htmlspecialchars($Settings['position'])."</option>
                                                        <option value='Student'>Student</option>
                                                        <option value='Mentor'>Mentor</option>
                                                    </select>";
      echo "<br><br><br>";


      echo " <select name=' country'  class=' nice-select'  name=' sortby' >
                                                        <option >".htmlspecialchars($Settings['country'])."</option>
                                                        <option value=' Bangladesh' >Bangladesh</option>
                                                        <option value=' New-Zealand' >New-Zealand</option>
                                                        <option value=' Australia' >Australia</option>
                                                        <option value=' China' >China</option>
                                                        <option value=' India' >India</option>
                                                        <option value=' USA' >USA</option>
                                                        <option value=' Switzerland' >Switzerland</option>
                                                        <option value=' Canada' >Canada</option>
                                                        <option value=' Japan' >Japan</option>
                                                        <option value=' Germany' >Germany</option>
                                                        <option value=' Swedan' >Swedan</option>
                                                        <option value=' Greece' >Greece</option>
                                                        <option value=' Thailand' >Thailand</option>
                                                        <option value=' Indonesia' >Indonesia</option>
                                                        <option value=' South-Africa' >South-Africa</option>
                                                        <option value=' Turkey' >Turkey</option>
                                                    </select>";


       echo "<br><br><br>";
  echo "<input type = 'text' class= 'col-md-6' name = 'field' value ='".htmlspecialchars($Settings['field'])."' placeholder = 'Field' />";
     
         echo "<h5>About me </h5>";
          echo "<textarea name='about' class='share-field-big custom-scroll' >".htmlspecialchars($Settings['about'])."</textarea> ";
           echo "<br><br>";
         
         echo "<h5>Description</h5>";
         echo "<textarea name='description' class='share-field-big custom-scroll' >".htmlspecialchars($Settings['description'])."</textarea> ";
        echo " <button value = 'save' type = 'submit' class='submit-btn'>Save</button>";


    }

   



    ?>
     
        
       
    </form>


  </div>
</div>


  