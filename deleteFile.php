<?php
/*  Program name: deleteFile.php
 *  Description:  Deletes a file from the recipe Database
 */

  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

echo "<html><head><meta http-equiv='Content-Type' content='text/html;charset=UTF-8'><title>Delete Recipe</title></head><body>";
echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";


echo "<h2>Delete a Recipe</h2>";
include("recipe_login.inc");

  $connection = mysql_connect($host,$user,$password)
       or die ("couldn't connect to server");
  $db = mysql_select_db($database,$connection)
       or die ("Couldn't select database");

  if ($_POST['dtitle'] == "")
    {exit("Cannot leave the title blank");}
  else
    {
    $tvalue = $_POST['dtitle'];
    $query = "DELETE FROM recipeTable WHERE title='$tvalue'";
    $result = mysql_query($query) or die ("couldn't execute query.");
    echo "<b>The following entry has been successfully deleted:</b><br>";
    echo "<b>Title: </b>$tvalue2<br>";
    }

echo "<br>Search for another recipe to delete"; 
include ("delete_start.inc");
echo "<br><a href='index.php'>Return to the Home Page</a>";
?>


</body></html>
