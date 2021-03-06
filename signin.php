<?php  
/*************************
file:signin.php
purpose: sign in the user
******************************/
  
include 'connect.php';  
include 'header.php';  

echo '<h3>Sign in</h3>';  

 /* review this, it looks redundant */ 
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)  
{  
  echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';  
}  

else  
{  
    if($_SERVER['REQUEST_METHOD'] != 'POST')  
    {  
        echo '<form method="post" action="">  
        Username: <input type="text" name="username" />  <br />
        Password: <input type="password" name="password">  <br />
        <input type="submit" value="Sign in" />  
        </form>'; 
    } 
    else 
    { 
        $errors = array(); 
      
        if(!isset($_POST['username']))  
        {  
            $errors[] = 'The username field must not be empty.';  
        }  
      
        if(!isset($_POST['password']))  
        {  
            $errors[] = 'The password field must not be empty.';  
        }  
      
        if(!empty($errors)) 
        {  
            echo 'Uh-oh.. a couple of fields are not filled in correctly..'; 
            echo '<ul>'; 
          
            foreach($errors as $key => $value) /
            { 
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */ 
            } 
          
            echo '</ul>'; 
        } 
        else 
        { 
             $sql = "SELECT id, username, level, active FROM user WHERE 
             username = '" . mysql_real_escape_string($_POST['username']) . "' 
             AND password = '" . sha1($_POST['password']) . "'";  
             $result = mysql_query($sql);  
            
            if(!$result)  
            {  
                //something went wrong, display error  
                echo 'Something went wrong while signing in. Please try again later.'; 
                //echo mysql_error(); //debugging purposes, uncomment when needed 
            } 
          
            else 
            { 
                /*
                
                The query was successfully executed, there are 2 possibilities 
                1. the query returned data, the user can be signed in
                  a.  If account is active proceed normally
                  b.  if inactive display error.  Signed in = false
                      do not set any values  
                2. the query returned an empty result set, the credentials were wrong
                
                */ 
              
                if(mysql_num_rows($result) == 0) 
                { 
                    echo 'You have supplied a wrong user/password combination. Please try again.'; 
                } 
              
                else 
                {     //if you are in my dbase
                      //CHECK IF ACCOUNT IS ACTIVE
                     while($row=mysql_fetch_array($result))
                     {
                          if($row[active] == 0 )
                          {
                               echo 'Your account is inactive.  You must wait until an admin signs off on you. Thank you for your patience.';
                          }
                       
                          else if($row[active] == 1)
                          {
                               //set the $_SESSION['signed_in'] variable to TRUE 
                               $_SESSION['signed_in'] = true; 
                               
                              //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages 
                              $_SESSION['id']    = $row['id']; 
                              $_SESSION['username']  = $row['username']; 
                              $_SESSION['level'] = $row['level']; 
                    
                              echo 'Welcome, ' . $_SESSION['username'] . '. <a href="index.php">Return to Forum</a>.'; 
                          }
               
                     }                  
                  
               }
            }
        } 
    } 
 
  }

include 'footer.php';  
?>  
    
