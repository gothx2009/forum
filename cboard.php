<?php

/************************

file: cboard.php
purpose:  administrator control panel


*************************/

include 'header.php';
include 'connect.php';

if($_SESSION['signed_in'] == true AND $_SESSION['level'] == 1)
{
echo 'Welcome Admin!<BR /><BR />';
echo 'Inactive Accounts:<br /><br />';

$sql="SELECT username, email, date FROM user WHERE active = 0";
$result=mysql_query($sql);

	if(mysql_num_rows($result) == 0)
	{
	echo 'No Inactive Accounts';
	}

	while($row=mysql_fetch_array($result))
	{
	echo 'Account name:&nbsp&nbsp '  . $row['username'] . '<br />Email: ' . $row['email'] . '<br />Creation Date/Time: '  .  $row['date'] . '<br /><form method="post" action="activate.php?username=' . $row[username] . '"><input type="submit" value="activate" /></form>';
echo '<br /><br />' ;       
     	}

	$sql2="SELECT username, email, date, level FROM user WHERE active = 1";
	$result=mysql_query($sql2);

	echo "<br /><br />Active Accounts:<br /><br />";

	while($row=mysql_fetch_array($result))
	{
	echo 'Account name:&nbsp&nbsp '  . $row['username'] . '<br />Email: ' . $row['email'] . '<br />Creation Date/Time: '  .          $row['date'] . '<br />Account Level: ' . $row['level'] . '<br /><br />';
	}

}

else 
{
echo  'You are not an admin.  This incident has been reported';
}

include 'footer.php';


?>
