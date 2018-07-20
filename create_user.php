<?php
   
   // Display create user form
       $result =  "        <form class=\"userform\">";
       $result = $result . "     <h2>Login</h2>";
       $result = $result . "     <label for=\"username\">Username:</label>";
       $result = $result . "     <input type=\"text\" name=\"username\" id=\"username\" value=\"\" data-clear-btn=\"true\" data-mini=\"true\">";
       $result = $result . "     <label for=\"password\">Password:</label>";
       $result = $result . "     <input type=\"password\" name=\"password\" id=\"password\" value=\"\" data-clear-btn=\"true\" autocomplete=\"off\" data-mini=\"true\">";
       //$result = $result . "     <div class=\"ui-grid-a\">";
       //$result = $result . "         <div class=\"ui-block-a\"><a href=\"#\" data-rel=\"close\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini\">Cancel</a></div>";
       //$result = $result . "         <div class=\"ui-block-b\"><a href=\"#\" data-rel=\"close\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini\">Save</a></div>";
       //$result = $result . "     </div>";
       $result = $result . "     <button type=\"button\" onClick=\"myFunction()\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini\">Click me</button>";
       //$result = $result . "     <a href=\"#\" id=createUser data-rel=\"close\" class=\"ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini\">Create New User</a>";
       $result = $result . " </form>";
   echo $result;
?>
