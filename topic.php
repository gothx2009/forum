<?php
include 'header.php';
include 'connect.php';

$escid = mysql_real_escape_string($_GET[id]);

//for post POSTS TABLE                           
$sql="SELECT * FROM posts WHERE topic = '$escid'";
$result=mysql_query($sql);

//for subject TOPICS TABLE
$sql2="SELECT * FROM topics WHERE id = '$escid'";
$result2=mysql_query($sql2);

if(!$result or !$result2){
echo 'something went wrong.....try later....';
}

else
{
//subject
echo '<table border="1">';
  while($row=mysql_fetch_array($result2)){
      echo '<th>' . $row['subject'] ;
  }

//post
while($row=mysql_fetch_array($result)){

  echo '<tr><td>';
//put user info here ie avatar etc.
  echo $row['who'];
  echo '</td><td>';
  
  echo $row['content'];
  echo '</tr></td>';

  }//end while
  echo '</table>';

}

//give option to add on
echo '<a href="new_reply.php?id='. $escid.  ' ">Post Reply</a>';

include 'footer.php';
?>
