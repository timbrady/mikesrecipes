<html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><title>Mike''s Recipes</title></head><body>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }
?>


<table border=0 width=100%><tr><td align=left>
<img src=/images/small_graphic.jpg></td><td align=right>
Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href="geteditprocess.php?search=$value">Edit</a></td></tr>
<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>


<?php

require "recipe_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

foreach ($_POST as $field => $value)
{
$search = "%$value%";
}

$cleansearch = trim($value);
$part_count = substr_count($cleansearch," ");
$searchparts = explode(" ",$cleansearch);
$search1 = "%$searchparts[0]%";
$search2 = "%$searchparts[1]%";
$search3 = "%$searchparts[2]%";
$pair1 = "%$searchparts[0] $searchparts[1]%";
$pair2 = "%$searchparts[1] $searchparts[2]%";

echo "Search Results for <b>$value</b><br><ul>";

switch ($part_count)
 {
case "0":

$query = "SELECT * FROM recipeTable WHERE title LIKE '$search' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search'"; 
$result = mysql_query($query) or die("couldn't execute query");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
EXTRACT($row);
echo "<li><a href=/recipes/"; echo "$wordfile"; echo">$title</a><br>";
if ($abstract == "")
    {echo "<br>";}
else {$abstract = utf8_encode($abstract);
    echo "$abstract<br><br>";}
}
break;

case "1":

$query = "SELECT * FROM recipeTable WHERE title LIKE '$search' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search' UNION SELECT * FROM recipeTable WHERE title LIKE '$search2' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search2' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search2' UNION SELECT * FROM recipeTable WHERE title LIKE '$search1' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search1' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search1'"; 

$result = mysql_query($query) or die("couldn't execute query");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
   {
EXTRACT($row);
echo "<li><a href=/recipes/"; echo "$wordfile"; echo">$title</a><br>";
if ($abstract == "")
{echo "<br>";}
else {$abstract = utf8_encode($abstract);
    echo "$abstract<br><br>";}
   }
break;

case "2":

$query = "SELECT * FROM recipeTable WHERE title LIKE '$search' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search' UNION SELECT * FROM recipeTable WHERE title LIKE '$pair2' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$pair2' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$pair2' UNION SELECT * FROM recipeTable WHERE title LIKE '$pair1' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$pair1' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$pair1' UNION SELECT * FROM recipeTable WHERE title LIKE '$search2' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search2' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search2' UNION SELECT * FROM recipeTable WHERE title LIKE '$search1' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search1' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search1'"; 

$result = mysql_query($query) or die("couldn't execute query");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
   {
EXTRACT($row);
echo "<li><a href=/recipes/"; echo "$wordfile"; echo">$title</a><br>";
if ($abstract == "")
{echo "<br>";}
else {$abstract = utf8_encode($abstract);
    echo "$abstract<br><br>";}
   }
break;

default:
echo "please use less than 3 words in your search";

}


echo "</ul>";

echo "<form action='searchprocess.php' method='POST'>
<input type='text' name='searchTerm' size=50 value='$value'>
<input type='submit' value='Search Again'>
</form>
<br>";



echo "</body></html>";

?>





