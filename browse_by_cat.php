 <html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></head><body>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

$user="root";
$host="localhost:3306";
$password="KvRl2BlhSAM-";
$database="recipes";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

$topic = $_GET['purpose'];
$subcat = $_GET['category'];
$sub_cat = "%$subcat%";

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "Browse by <b>$topic</b> and <b>$subcat</b><br><ul>";

$query = "SELECT * FROM recipeTable WHERE purpose LIKE '$topic' AND (title LIKE '$sub_cat' OR keywords LIKE '$sub_cat' OR abstract LIKE '$sub_cat')";
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
echo "<a href=index.php>Return to Home Page</a><br>";
echo "</body></html>";
?>





