<?php
   
   
   include(dirname(__FILE__) . '/../../includes/db_details.php'); 
   // get user name
   $userName = $_REQUEST["username"];
   
   // check user name for length
      
   // get user pw
   $userPassword = $_REQUEST["password"];
   
   
   // check length and strength
      
   // connect to db

    mysql_connect($db_host, $db_user_name, $db_password);
    mysql_select_db ("website");
    // mysqli 
    // $link = mysqli_connect("localhost", $username, $password,$dbname); 
    $sql = sprintf("INSERT INTO users (name, password)    VALUES    ('%s', '%s')",
    /***
     * For all mysqli_ functions below, the syntax is:
     * mysqli_whartever($link, $functionContents); 
     ***/
    mysql_real_escape_string($userName),
    mysql_real_escape_string($userPassword)

    );
    mysql_query($sql);
   // return error
   
   // else return success redirect to main page
   echo "Success";
?>


<?php
   
 
   
   // else return success redirect to main page
   echo "Success";
?>