<?php  

/********************************
file: category.php
purpose: pull up topics in a category

*********************************/
 
include 'connect.php';  
include 'header.php';  


$gotid=mysql_real_escape_string($_GET['id']);
$sql = "SELECT id, name, descr FROM cat WHERE id = '$gotid'  ";  
$result = mysql_query($sql);


if(!$result)  
{  
    echo 'something went wrong.......try later' . mysql_error();  
}

  
else   
{  
    if(mysql_num_rows($result) == 0)  
    {  
        echo 'This category does not exist.';  
    }  
    else  
    {  
        while($row = mysql_fetch_array($result))  
        {  
            echo '<h2>Topics in ' . $row['name'] . ' category</h2>';  
        }  
       
$sql = "SELECT id, subject, date, cat FROM topics WHERE cat = '$gotid'   ";  
$result = mysql_query($sql);  


        if(!$result)  
        {  
            echo 'The topics could not be displayed, please try again later.';  
        }  
        else  
        {  
            if(mysql_num_rows($result) == 0)  
            {  
                echo 'There are no topics in this category yet.<br />';
                
            }  
            else  
            {  
               
                echo '<table border="1"> 
                      <tr> 
                        <th>Topic</th> 
                        <th>Created at</th> 
                      </tr>';  
                while($row = mysql_fetch_array($result))  
                {  
                    echo '<tr>';  
                        echo '<td class="leftpart">';  
                            echo '<h3><a href="topic.php?id=' . $row['id'] . '">' . $row['subject'] . '</a><h3>';  
                        echo '</td>';  
                        echo '<td class="rightpart">';  
                            echo date('d-m-Y', strtotime($row['date']));  
                        echo '</td>';  
                    echo '</tr>';  
                    
                }//end while 
                       
                  //end displaying things 
            }//end else  
        }//end else  
    }//end else  
}//end else

 
 echo '<a href="new_topic.php?id=' . $gotid . '">New Topic</a>';
 
include 'footer.php';  
?>  
      
