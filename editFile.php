<?php
/*  Program name: uploadForm.php
 *  Description:  Program uploads a new recipe into the recipe Database
 */
echo "<html>
      <head><meta http-equiv='Content-Type' content='text/html;charset=UTF-8'><title>Upload Form</title></head>
      <body>";

 require "recipe_login.inc";

  $connection = mysql_connect($host,$user,$password)
       or die ("couldn't connect to server");
  $db = mysql_select_db($database,$connection)
       or die ("Couldn't select database");

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "<h2>Edit a Recipe</h2>";

  if ($_POST['title'] == "")
    {exit("Cannot leave the title blank");}
  else
    {
    $tvalue = $_POST['title'];
    $wfvalue = $_POST['wordfile'];
    $pvalue = $_POST['purpose'];
    $abvalue2 = $_POST['abstract'];
    $abvalue = utf8_decode ($abvalue2);
    $abvalue = htmlspecialchars($abvalue,ENT_QUOTES);
    $kvalue = $_POST['keywords'];
    $query = "UPDATE recipeTable SET title='$tvalue',purpose='$pvalue', abstract='$abvalue',keywords='$kvalue' WHERE wordfile='$wfvalue'";
    $result = mysql_query($query) or die ("couldn't execute query.");

    echo "<b>The following entry has been successfully changed:</b><br>";
    echo "<b>Title:</b> $tvalue<br>";
    echo "<b>Purpose:</b> $pvalue<br>";
    echo "<b>Keywords:</b> $kvalue<br>";
    echo "<b>Abstract:</b> $abvalue2<br>";
    }

echo "<br>Search for another recipe to edit"; 
include ("edit_start.inc");
echo "<br><a href='index.php'>Return to Home Page</a>";
?>


</body></html>
