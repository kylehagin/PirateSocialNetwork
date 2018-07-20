//username

//pw?

//image_id

// get current number doubloons

// increment

// set new number doubloons

// 



<?php
   
   // user name

// pw

// matey user name

// set friendship with pending confirmation
   include(dirname(__FILE__) . '/../../includes/db_details.php'); 
   // get user name
   $userName = $_REQUEST["username"];
   
   // check user name for length
      
   // get user pw
   $userPassword = $_REQUEST["password"];
 
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
      //echo $userID;
  }
   

  if($userID)
  {

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
  $row = mysql_fetch_assoc($result);
   
   // check length and strength
      
   // connect to db
   $mateyImage = $row['user_image'];
   $mateyUserId = $row['user_id'];
    // mysqli 
    // $link = mysqli_connect("localhost", $username, $password,$dbname); 
    $sql = sprintf("INSERT INTO mateys (user_id, matey_user_id, matey_image, confirmed)    VALUES    ('%s', '%s','%s', '%d')",
    /***
     * For all mysqli_ functions below, the syntax is:
     * mysqli_whartever($link, $functionContents); 
     ***/
    mysql_real_escape_string($userID),
    mysql_real_escape_string($mateyUserId),
    mysql_real_escape_string($mateyImage),
    0
    );
    mysql_query($sql);
   // return error
   
   // else return success redirect to main page
   echo "Success";
   }
?>


<?php
   
 
   
   // else return success redirect to main page
   echo "Success";
?>