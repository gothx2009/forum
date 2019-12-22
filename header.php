<!DOCTYPE html>  
<html> 
<head>   
    <title>Talk</title>   
    <link rel="stylesheet" type="text/css" href="style.css">
</head>  
<body>  
<?php
session_start();
?>

<h1>Forum</h1>
 

    <div id="wrapper">  
    <div id="menu">  
        <a class="item" href="index.php">Home</a>
        
<?php
if($_SESSION['signed_in'] == true AND $_SESSION['level'] == 1)
{
echo '<a class="item" href="cboard.php">Control Panel</a>'; 
}

?> 
        
        
         <div id="userbar"> 
        <div id="userbar">  
        <?php  
 
    if($_SESSION['signed_in'] == true)  
    {  
        echo 'Hello ' . $_SESSION['username'] . '. Not you? <a href="signout.php">sign out</a>';
         
    }  
    else  
    {  
        echo '<a href="signin.php">Sign in</a> or <a href="signup.php">create an account</a>.';  
    }  

?>    
    </div>  
        <div id="content">  
