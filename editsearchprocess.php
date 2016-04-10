<html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></head>
<body>
<?php

  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

require "recipe_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("couldn't connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "<h2>Edit a Recipe</h2>";

foreach ($_GET as $field => $value)
{
echo "Search Results for <b>$value</b><br><br>";
}

echo "<ul>";
$search = "%$value%";

$query = "SELECT * FROM recipeTable WHERE title LIKE '$search'";
$result = mysql_query($query) or die("couldn't execute query");

while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
EXTRACT($row);
echo "<li><u>$title</u> [ <a href=editProcess.php?wordfile=$wordfile>Edit</a> ]
<br>";
if ($abstract == "")
    {echo "<br>";}
   else {echo "$abstract<br><br>";}
}
echo "</ul>";
echo "<form action='editsearchprocess.php' method='GET'>
<input type='text' name='searchTerm' size=50 value='$value'>
<input type='submit' value='Submit Name'>
</form>
<br>";



echo "</body></html>";

?>





