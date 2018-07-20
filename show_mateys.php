

<?php
   
// get user name
// get pw


// lookup user id

// look up mateys based on user_id 

// get each matey user name and user_image

// build mateys grid items
   
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
      //echo $userID;
  }

   $folder = "main";
   // build query
   $query = sprintf("SELECT * FROM mateys WHERE user_id ='%s' ",  
    mysql_real_escape_string($userID)

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
 
       //$formOutput =    "        <form class=\"userform\">";
       $formOutput =   "     <h2>Search Mateys</h2>";
       $formOutput = $formOutput . "     <label for=\"matey_name\">Username:</label>";
       $formOutput = $formOutput . "     <input type=\"text\" name=\"matey_name\" id=\"matey_name\" value=\"\" data-clear-btn=\"true\" data-mini=\"true\">";
       $formOutput = $formOutput . "     <button type=\"button\" onClick=\"searchMateys()\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini\">Click me</button>";
       //$formOutput = $formOutput . " </form>";
   echo $formOutput;
   echo '|';
  //$grid_item_heights = array(' ', 'grid-item--height2');
  //$grid_item_widths  = array(' ', 'grid-item--width2');
  while ($row = mysql_fetch_assoc($result)) {
      //echo $row['path'];
      //$paths[$path_count] = $row['path'];
      //$path_count = $path_count + 1;
      //echo($row['matey_image']);
      
      //$random_index = rand(0,1);
      
      $feedback_div = "<div style=\"position: absolute;left:0;bottom:0; \"  ><span style=\"text-align:right\"><img src=\"pirate_note_small.png\" width=\"16\" height=\"16\">10</span></div>";
      //$feedback_div = "<img border=\"0\" src=\"adoubloons.png\" width=\"16\" height=\"16\">";
      echo "<div class=\"grid-item\" style=\"position:relative;background-image: url(image.php?img=".$row['matey_image'].");background-size: cover;\">".$feedback_div."</div>";
      
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
