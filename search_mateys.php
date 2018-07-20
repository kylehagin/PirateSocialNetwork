



<?php
   
// username

// pw

// matey username to search

// query mateys table

// if found 

// return matey user id matey image and username

// else return none found
   
   include(dirname(__FILE__) . '/../../includes/db_details.php'); 
   // get user name
   $userName = $_REQUEST["username"];
   
   // check user name for length
      
   // get user pw
   $userPassword = $_REQUEST["password"];
   
   // search
   $userSearch = $_REQUEST["matey_name"];
  
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
  if($userID)
  {
   $folder = "main";
   // build query
   $query = sprintf("SELECT * FROM users WHERE name ='%s' ",  
    mysql_real_escape_string($userSearch)

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
 
  //$grid_item_heights = array(' ', 'grid-item--height2');
  //$grid_item_widths  = array(' ', 'grid-item--width2');
  while ($row = mysql_fetch_assoc($result)) {
      //echo $row['path'];
      //$paths[$path_count] = $row['path'];
      //$path_count = $path_count + 1;
      
      
      //$random_index = rand(0,1);
      
      //$feedback_div = "<div style=\"display: none;position: absolute;left:0;bottom:0; \"  ><span style=\"text-align:right\"><img src=\"pirate_note_small.png\" width=\"16\" height=\"16\">10</span></div>";
      //$feedback_div = "<img border=\"0\" src=\"adoubloons.png\" width=\"16\" height=\"16\">";
      //echo "<div class=\"grid-item ".$grid_item_widths[$random_index]." ".$grid_item_heights[$random_index]."\" style=\"position:relative;background-image: url(image.php?img=".$row['matey_image'].");background-size: cover;\">".$feedback_div."</div>";
      
      echo $row['name'];
      echo '|';
      //echo ", ";
      
      echo "<div> <h1>".$row['name']."</h1><p><img src=\"image.php?img=".$row['user_image']."\" width=\"16\" height=\"16\"></p><a href=\"#\" onclick=\"addMatey(); return false;\" data-icon=\"home\" data-iconpos=\"notext\"  >Add Matey</a></div>";
      
  }   
  //echo "]";
//
   // build directory/filename
   
   // add photo link to db
   
   // Update content on main page
   
   // build list 
   
   // Display main page content
  } 
  // Free the resources associated with the result set
  // This is done automatically at the end of the script
  mysql_free_result($result);
?>
