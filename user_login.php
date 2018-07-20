<?php
   
   // get user info
   // name 
   // pw
   // get file data
   
   include(dirname(__FILE__) . '/../../includes/db_details.php'); 
   // get user name
   $userName = $_REQUEST["username"];
   
   // check user name for length
      
   // get user pw
   $userPassword = $_REQUEST["password"];
  
   // connect to db
   mysql_connect($db_host, $db_user_name, $db_password);
   mysql_select_db ("website");
   
   // build query
   $query = sprintf("SELECT * FROM users WHERE name ='%s' AND password = '%s'",  
    mysql_real_escape_string($userName),
    mysql_real_escape_string($userPassword)

    );
   
   // check db for pass word


  // Perform Query
  $result = mysql_query($query);

  // Check result
  // This shows the actual query sent to MySQL, and the error. Useful for debugging.
  if (!$result) {
      $message  = 'Invalid query: ' . mysql_error() . "\n";
      $message .= 'Whole query: ' . $query;
      die($message);
  }

  // Use result
  // Attempting to print $result won't allow access to information in the resource
  // One of the mysql result functions must be used
  // See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
  while ($row = mysql_fetch_assoc($result)) {
      //echo $row['name'];
      $userID = $row['user_id'];

  }

   $folder = "main";
   // build query
   $query = sprintf("SELECT * FROM images WHERE user_id ='%s' AND user_folder = '%s'",  
    mysql_real_escape_string($userID),
    mysql_real_escape_string($folder)

    );
   
   // check db for pass word


  // Perform Query
  $result = mysql_query($query);

  // Check result
  // This shows the actual query sent to MySQL, and the error. Useful for debugging.
  if (!$result) {
      $message  = 'Invalid query: ' . mysql_error() . "\n";
      $message .= 'Whole query: ' . $query;
      die($message);
  }

  // Use result
  // Attempting to print $result won't allow access to information in the resource
  // One of the mysql result functions must be used
  // See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
  //$path_count = 0;
 // echo '[ ';
 
  $grid_item_heights = array(' ', 'grid-item--height2', 'grid-item--height3', 'grid-item--height4');
  $grid_item_widths  = array(' ', 'grid-item--width2', 'grid-item--width3', 'grid-item--width4');
  while ($row = mysql_fetch_assoc($result)) {
      //echo $row['path'];
      //$paths[$path_count] = $row['path'];
      //$path_count = $path_count + 1;
      
      
      $random_index = rand(0,3);
      
      $feedback_div = "<div style=\"display: none;position: absolute;left:0;bottom:0; \"  ><img src=\"adoubloons.png\" width=\"16\" height=\"16\">10 <span style=\"text-align:right\"><img src=\"pirate_note_small.png\" width=\"16\" height=\"16\">10</span></div>";
      //$feedback_div = "<img border=\"0\" src=\"adoubloons.png\" width=\"16\" height=\"16\">";
      echo "<div class=\"grid-item ".$grid_item_widths[$random_index]." ".$grid_item_heights[$random_index]."\" style=\"position:relative;background-image: url(image.php?img=".$row['path'].");background-size: cover;\">".$feedback_div."</div>";
      echo '|';
      //echo ", ";
  }  
  //echo "]";
//
   // build directory/filename
   
   // add photo link to db
   
   // Update content on main page
   
   // build list 
   
   // Display main page content
   
  // Free the resources associated with the result set
  // This is done automatically at the end of the script
  mysql_free_result($result);
?>
