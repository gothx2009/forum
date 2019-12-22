<?php

/*****************************************

file:  activate.php
purpose: for use by site administrator to activate registered accounts
Prevents spam accounts , bots etc.  When someone registers their account
is inactive unit this script is run

******************************************/


include 'header.php';
include 'connect.php';

$safe_username = mysql_real_escape_string($_GET[username]);

//If they are an admin they can access
if($_SESSION['level'] == 1)
{

$sql="UPDATE user SET active=1 WHERE username = "$safe_username" ";
$result=mysql_query($sql);

	//if there is an error
	if(!$result)
	{
	echo 'something went wrong.....try later....';
	}
	else
	{
	echo 'account activated';
	}

}

else
{
echo 'You are not an admin.  This incident has been reported.';

}

include 'footer.php';
?>
