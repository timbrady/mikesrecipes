<DOCTYPE html> 
<html><head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head><body>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

require "db_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("couldn't connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "<h3>Browse Desserts by categories</h3><br><ul>";

echo "<li><a href='browse_by_cat.php?purpose=dessert&category=cake'>Cakes</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=dessert&category=cookie'>Cookies</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=dessert&category=ice cream'>Ice Cream</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=dessert&category=pie'>Pies</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=dessert&category=chocolate'>Anything that contains Chocolate</a><br><br>";
echo "<li><a href='browse.php?purpose=dessert'>All Desserts</a><br><br>";
echo "</ul>";
echo "<br><br><font size=-1><a href=index.php>Return to Home Page</a></font><br>";
echo "</body></html>";
?>





