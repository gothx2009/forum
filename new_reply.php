<?php

/**********************
file: new_reply.php
purpose: form to make a reply
****************************/

include 'header.php';
include 'connect.php';

if(!$_SESSION[signed_in])
{
echo 'Sorry, you must be signed in to post. <a href="signin.php">Sign in</a>';
}
else
{

$escid = mysql_real_escape_string($_GET['id']);

echo '  Message:<br /> <form method="post" action="create_reply.php?id=' . $escid  . ' ">
         <textarea name="content"></textarea><br />
         <input type="submit" value="submit" />
  </form>';

}

include 'footer.php';
?>
