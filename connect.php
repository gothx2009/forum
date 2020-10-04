<?php

/**********************************
file:connect.php
purpose:connection info to DB

**********************************/

  // Close connection.
  //  -- This is legacy.  Please use $db->close()
  function db_close() {
    global $db;
    $db->close();
  }
  $db = new mysqli("localhost","root","","forum");
  if($db->connect_error) {
    die($db->connect_error);
  }
?>
