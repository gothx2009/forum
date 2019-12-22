<?php  
/************************************
file:index.php
purpose:main file listing categories
*************************************/

include 'connect.php';
include 'header.php';  
echo '<tr>';  
echo '<td class="leftpart">';  

$sql = "SELECT id, name, descr FROM cat";
$result = mysql_query($sql);

if(!$result)
{
echo 'Something went wrong.  Please try again later.';
}
else
{
     if(mysql_num_rows($result) == 0)
     {
      echo 'No categories yet!';
     }
     else
     {
     echo '<table border="1">
     <tr>
     <th>Category</th>
     <th>Last Post</th>
     </tr>';

	$tmp=mysql_query("SELECT COUNT(*) FROM topics");
	$troll=mysql_fetch_assoc($tmp);
	$size=$troll['COUNT(*)'];
	$query="SELECT * FROM topics WHERE id = $size";
	$q=mysql_query($query);  
	

     while($row = mysql_fetch_array($result))  
     {  
            echo '<tr>';  
                echo '<td class="leftpart">';
                echo '<h3><a href="category.php?id=' . $row['id'] . ' ">' . $row['name'] . '</a></h3>' . $row['descr'];
                echo '</td>';  
                echo '<td class="rightpart">';  


		while($foo = mysql_fetch_array($q)){

                echo '<a href="topic.php?id="> ' . $foo['subject'] . '</a> at  ' .  $foo['date']  . '      '; 

		} 
                echo '</td>';  
            echo '</tr>';  
    }  
    }  

echo '</table>';
}  

include 'footer.php';  
?>  
