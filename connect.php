<?php

/**********************************
file:connect.php
purpose:connection info to DB

**********************************/

$connection;
db_connect();  


// close connection
function db_close()
{
global $connection;
mysql_close($connection);
}

function db_connect()
{

$DB_NAME = "";
$DB_HOST = "";
$DB_USER = "";
$DB_PASS = "";
global $connection;
$connection = mysql_connect($DB_HOST, $DB_USER, $DB_PASS)
or die("Cannot connect to $DB_HOST as $DB_USER:" . mysql_error());
mysql_select_db($DB_NAME) or die ("Cannot open $DB_NAME:" . mysql_error());
return $connection;
}


?>
