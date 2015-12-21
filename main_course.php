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

$connection = mysql_connect($host,$user,$password) or die ("couldn't connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");


echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "<h3>Browse Main Course by categories</h3><br><ul>";

echo "<li><a href='browse_by_cat.php?purpose=main&category=beef'>Beef</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=main&category=pork'>Pork</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=main&category=duck'>Duck</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=main&category=chicken'>Chicken</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=main&category=fish'>Fish</a><br><br>";
echo "<li><a href='browse_by_cat.php?purpose=main&category=seafood'>Seafood</a><br><br>";
echo "<li><a href='browse.php?purpose=main'>Complete List</a>";


echo "</ul>";
echo "<br><br><font size=-1><a href=index.php>Return to Home Page</a></font><br>";
echo "</body></html>";
?>





