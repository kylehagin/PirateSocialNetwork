<?php
	
	// get user name
	
	// get password
	
	// get user id
	
    // get user info
   // name 
   // pw
   // get file data
    echo 'enter';
   include(dirname(__FILE__) . '/../../includes/db_details.php'); 
   
  
   // get user name
   $userName = $_REQUEST["userName"];
   echo $userName;
   // check user name for length
      
   // get user pw
   $userPassword = $_REQUEST["passWord"];
  echo $userPassword;
    // get folder
   $folder = $_REQUEST["folder"];
  echo $folder;
   // connect to db
   $link = mysql_connect($db_host, $db_user_name, $db_password);
   
   if (!$link) 
   {
      echo 'died';
      die('Could not connect: ' . mysql_error());
      
   }
   
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
      echo 'died';
      die($message);
  }
  $userId = 0;
  // Use result
  // Attempting to print $result won't allow access to information in the resource
  // One of the mysql result functions must be used
  // See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
  while ($row = mysql_fetch_assoc($result)) {
      echo "name".$row['name'];
      $userId = $row['user_id'];
      echo $userId;
  }
	
  mysql_close($link);	
	
  if($userId)
  {
    echo 'inner';
    // loop through the array of files
    foreach($_FILES as $index => $file)
    {
	// for easy access
	$fileName     = $file['name'];
	// for easy access
	$fileTempName = $file['tmp_name'];
	// check if there is an error for particular entry in array
	if(!empty($file['error'][$index]))
	{
		// some error occurred with the file in index $index
		// yield an error here
		return false;
	}

	// check whether file has temporary path and whether it indeed is an uploaded file
	if(!empty($fileTempName) && is_uploaded_file($fileTempName))
	{
		
		$path =  "/var/images/" . $fileName;
		// move the file from the temporary directory to somewhere of your choosing
		move_uploaded_file($fileTempName, $path);
		// mark-up to be passed to jQuery's success function.
		echo '<p>Click <strong><a href="uploads/' . $fileName . '" target="_blank">' . $fileName . '</a></strong> to download it.</p>';
	
		// connect to mysql
		$link = mysql_connect($db_host, $db_user_name, $db_password);
		mysql_select_db ("website");
		// mysqli 
		// $link = mysqli_connect("localhost", $username, $password,$dbname); 
		$sql = sprintf("INSERT INTO images (user_id, path, user_folder)    VALUES    ('%s', '%s', '%s')",
		/***
		* For    all mysqli_ functions below, the syntax is:
		* mysqli_whartever($link, $functionContents); 
		***/
		mysql_real_escape_string($userId),
		mysql_real_escape_string($path),
		mysql_real_escape_string($folder)

		);
		mysql_query($sql);
		
		mysql_close($link);
		// save user_id, path, user_folder to images table
	
	}
	  
	  
	  
    }
  }
  echo 'goodbye';
  mysql_free_result($result);	
	
?>

