<html><body>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

$user="tim";
$host="mysql";
$password="tim";
$database="recipes";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

foreach ($_POST as $field => $value)
{
$search = "%$value%";
}

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href='geteditprocess.php?search=$value'>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "Search Results for <b>$value</b><br><ul>";



$query = "SELECT * FROM recipeTable WHERE title LIKE '$search' UNION SELECT * FROM recipeTable WHERE abstract LIKE '$search' UNION SELECT * FROM recipeTable WHERE keywords LIKE '$search'"; 
$result = mysql_query($query) or die("couldn't execute query");

while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
EXTRACT($row);
echo "<li><a href=/recipes/"; echo "$wordfile"; echo">$title</a><br>";
if ($abstract == "")
    {echo "<br>";}
   else {echo "$abstract<br><br>";}
}

echo "</ul>";

echo "<form action='searchprocess.php' method='POST'>
<input type='text' name='searchTerm' size=50 value='$value'>
<input type='submit' value='Search Again'>
</form>
<br>";



echo "</body></html>";

?>





