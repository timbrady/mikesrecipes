<?php
/*  Program name: deleteProcess.php
 *  Description:  Delete an existing entry in the recipeTable */

  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

echo "<html>
      <head><meta http-equiv='Content-Type' content='text/html;charset=UTF-8'><title>Delete Process</title></head>
      <body>";

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";


echo "<h2>Delete a Recipe</h2>";

require "recipe_login.inc";

  $connection = mysql_connect($host,$user,$password) or die ("couldn't connect to server");
  $db = mysql_select_db($database,$connection) or die ("Couldn't select database");
 

$edit = $_GET['wordfile'];
echo $edit;
$query = "SELECT * FROM recipeTable WHERE wordfile='$edit'";
$result = mysql_query($query) or die("couldn't execute query");
$row = mysql_fetch_array($result,MYSQL_ASSOC);

EXTRACT($row);

$abstract = utf8_encode ($abstract);

echo "<form action='deleteFile.php' method='POST'>
You are about to delete the following recipe:<br>
<u>$title</u><br>
$abstract<br><br>
Are you sure you want to delete this?<br><br> 
<input type=hidden name='dtitle' value='$title'>
<input type='submit' value='Yes, I am sure'></form>
<form action='index.php' method='post'>
<input type='submit' value='No, Return to the Home Page'></form>";
?>

</body></html>






