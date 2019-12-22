<?php  
//signup.php  
include 'connect.php';  
include 'header.php';  
echo '<h3>Sign up</h3>';  
if($_SERVER['REQUEST_METHOD'] != 'POST')  
{  
    /*the form hasn't been posted yet, display it 
      note that the action="" will cause the form to post to the same page it is on */  
    echo '<form method="post" action="">  
        Username: <input type="text" name="username" /><br />  
        Password: <input type="password" name="password"><br />  
        Password again: <input type="password" name="user_pass_check"><br />  
        E-mail: <input type="email" name="email"><br />  
        <input type="submit" value="submit" />  
     </form>'; 
} 
else 
{ 
    /* so, the form has been posted, we'll process the data in three steps:  
        1.  Check the data  
        2.  Let the user refill the wrong fields (if necessary)  
        3.  Save the data  
    */  
    $errors = array(); /* declare the array for later use */  
    if(isset($_POST['username']))  
    {  
        //the user name exists  
        if(!ctype_alnum($_POST['username']))  
        {  
            $errors[] = 'The username can only contain letters and digits.';  
        }  
        if(strlen($_POST['username']) > 30)  
        {  
            $errors[] = 'The username cannot be longer than 30 characters.';  
        }  
    }  
    else  
    {  
        $errors[] = 'The username field must not be empty.';  
    }  
    if(isset($_POST['password']))  
    {  
        if($_POST['password'] != $_POST['user_pass_check'])  
        {  
            $errors[] = 'The two passwords did not match.';  
        }  
    }  
    else  
    {  
        $errors[] = 'The password field cannot be empty.';  
    }  
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/  
    {  
        echo 'Uh-oh.. a couple of fields are not filled in correctly..'; 
        echo '<ul>'; 
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */ 
        { 
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */ 
        } 
        echo '</ul>'; 
    } 
    else 
    { 
        //the form has been posted without, so save it 
        //notice the use of mysql_real_escape_string, keep everything safe! 
        //also notice the sha1 function which hashes the password 
         $sql = "INSERT INTO 
                    user(username, password, email , date, level, active) 
                VALUES('" . mysql_real_escape_string($_POST['username']) . "', 
                       '" . sha1($_POST['password']) . "', 
                       '" . mysql_real_escape_string($_POST['email']) . "', 
                        NOW(), 
                        0, 0)"; 
        $result = mysql_query($sql);  
        if(!$result)  
        {  
            //something went wrong, display the error  
            echo 'Something went wrong while registering. Please try again later.'; 
            //echo mysql_error(); //debugging purposes, uncomment when needed 
        } 
        else 
        { 
            echo 'Successfully registered.  Please wait until an Admin activates your account. <a href="index.php">Return to forum</a>'; 
        } 
    } 
} 
include 'footer.php';  
?>  
