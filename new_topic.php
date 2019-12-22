<?php  
//create_cat.php  
include 'connect.php';  
include 'header.php';  

if($_SESSION['signed_in'] == false)  
{  
    //IF THEY ARE NOT SIGNED IN  
    echo 'Sorry, you have to be <a href="signin.php">signed in</a> to create a topic.';  
}  
  else  //IF YOU ARE A MEMBER
  {  

//FOR DROPDOWN SELECT
 
        
           //SHOW THEM POSSIBLE THREADS TO PUT TOPIC IN
      
                echo '<form method="post" action="create_topic.php?id=' . $_GET['id'] .  '"> 
                    Subject: <input type="text" name="subject" /><br />'; 
                    
                echo 'Message: <br /><textarea name="content" /></textarea> 
                    <br /><input type="submit" value="Create topic" /> 
                 </form>';  

        }  
  //BREAK HERE FOR FORM SUBMIT  to make
  include 'footer.php';
          ?>
