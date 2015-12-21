<?php
/* Script name: searchRecipes.php
*  - display ths the info passed on from the test form
*/

  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }
?>
<html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><title>Search Result Form</title></head><body>

<?php

require "db_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("Couldn't connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to the database")

echo "here?";

$value = $_POST[$field]

echo "$value";

$query = "SELECT * FROM recipeTable WHERE title='$value'";

 echo "middle";

$result = mysql_query($query) or die ("couldn't execute query.");

echo "$result['title']"; echo "end";

echo "</body></html>";

?>
