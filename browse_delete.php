 <html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></head><body>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

require "recipe_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

$topic = $_GET['purpose'];

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href='browse_delete.php?purpose=$topic'>Delete</a> , <a href='browse_edit.php?purpose=$topic'>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "Browse by <b>$topic</b><br><ul>";

$query = "SELECT * FROM recipeTable WHERE purpose LIKE '$topic' ORDER BY title";
$result = mysql_query($query) or die("couldn't execute query");

while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
EXTRACT($row);
  echo "<li><font size=+1><a href=/recipes/"; echo "$wordfile"; echo">$title</a> [<a href=deleteProcess.php?wordfile=$wordfile>Delete</a>]</font><br>";
  if ($abstract == "")
      {echo "<br>";}
     else {$abstract = utf8_encode($abstract); echo "$abstract<br><br>";}
}

echo "</ul>";
echo "<a href=index.php>Return to Home Page</a><br>";
echo "</body></html>";
?>





