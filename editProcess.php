<?php
/*  Program name: editProcess.php
 *  Description:  Edits an existing entry in the recipeTable */
echo "<html>
      <head><meta http-equiv='Content-Type' content='text/html;charset=UTF-8'><title>Edit Process</title></head>
      <body>";
echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";
echo "<h2>Edit a Recipe</h2>";

include("recipe_login.inc");

  $connection = mysql_connect($host,$user,$password) or die ("couldn't connect to server");
  $db = mysql_select_db($database,$connection) or die ("Couldn't select database");
 

$edit = $_GET['wordfile'];
echo $edit;
$query = "SELECT * FROM recipeTable WHERE wordfile='$edit'";
$result = mysql_query($query) or die("couldn't execute query");
$row = mysql_fetch_array($result,MYSQL_ASSOC);

EXTRACT($row);

$temp_title = ereg_replace("'","&#39;",$title);
$abstract = utf8_encode($abstract);

echo "<form action='editFile.php' method='post'>
Information attached to <b>$wordfile</b>:<br><br>
<input type='hidden' name='wordfile' value='$wordfile'>
<table><tr><td><b>Title:</b></td><td><input type='text' size=50 name='title' value='$temp_title'></td></tr>
<tr><td><b>Purpose:</b></td><td><input type='text' name='purpose' value='$purpose' size=50></td></tr>
<tr><td><b>Keywords:</b></td><td><input type='text' name='keywords' value='$keywords' size=50></td></tr>
<tr><td valign=top><b>Abstract:</b></td><td><textarea name='abstract' cols=75 rows=10>$abstract</textarea></td></tr>
<tr><td colspan=2><input type='submit' name='edit' value='Edit Recipe'></td></tr></table>";

?>

</body></html>






