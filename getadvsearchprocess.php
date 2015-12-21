<html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></head><body>

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

$purpose = $_GET['purpose'];


echo "<table border=0 width=100%><tr><td align=left>";
echo "<a href=index.php><img src=/images/small_graphic.jpg border=0></a></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href='geteditprocess.php?search=$value'>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "Search Results for <b>$search</b><br><ul>";

$query = "SELECT * FROM recipeTable WHERE purpose='$purpose';
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