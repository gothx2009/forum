<?php
//create_topic
//sql to make it
include 'connect.php';
include 'header.php';


//Create a new topic
$safesubject=mysql_real_escape_string($_POST['subject']);
$gotid=mysql_real_escape_string($_GET['id']);
$gotusername=mysql_real_escape_string($_GET['username']);

$sql="INSERT INTO topics(subject,date,cat,who ) VALUES('$safesubject',NOW(),'$gotid', '$gotusername')";

$result=mysql_query($sql);

  if(!$result)
  {
  echo 'something went wrong......try again later...';
  }


$tmp=mysql_query("SELECT COUNT(*) FROM topics");
$troll=mysql_fetch_assoc($tmp);
$size=$troll['COUNT(*)'];

//Escape content
$content=mysql_real_escape_string($_POST[content]);



//here we insert new post
$sql2="INSERT INTO posts(content, who, topic) VALUES('$content', '$gotusername', '$size')";
$result=mysql_query($sql2);


if(!$result)
{
echo 'something went wrong......try again later...';
}

else
{
echo 'Topic creation successful <a href="index.php">Return to Forum</a>';
}

include 'footer.php';
?>
