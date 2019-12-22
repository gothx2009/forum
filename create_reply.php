<?php

/*************************
file:create_reply.php
purpose:this script inserts reply into DB
**************************/

include 'header.php';
include 'connect.php';

$safecontent=mysql_real_escape_string($_POST['content']);
$gotid=mysql_real_escape_string($_GET['id']);
$safeusername=$_SESSION['username'];

$sql="INSERT INTO posts(content, who, topic) VALUES( '$safecontent', '$safeusername' ,'$gotid')";
$result=mysql_query($sql);

if(!$result){
echo 'Something went wrong.....try again later...';
}
else
{
echo 'Post creation successful <a href="index.php">Return to Forum</a>';
}


include 'footer.php';
?>
