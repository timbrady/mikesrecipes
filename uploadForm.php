<html>
      <head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><title>Upload Form</title></head>
      <body>

<?php

/*  Program name: uploadForm.php
 *  Description:  Program uploads a new recipe into the recipe Database
 */

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a> (<a href=uploadFile1.php>tm</a>)";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";


require "recipe_login.inc";

  $connection = mysql_connect($host,$user,$password)
       or die ("couldn't connect to server");
  $db = mysql_select_db($database,$connection)
       or die ("Couldn't select database");

  if ($_POST['title'] == "")
    {exit("Cannot leave the title blank");}
  else
    {
    $tvalue = $_POST['title'];
    $wfvalue = $_POST['wordfile'];
    $pvalue = $_POST['purpose'];
    $abvalue = $_POST['abstract'];
    $abvalue = htmlspecialchars($abvalue,ENT_QUOTES);
    $kvalue = $_POST['keywords'];
    $dvalue = date("Y-m-d");
    $query = "insert into recipeTable (title, wordfile, purpose, abstract, keywords, date_entered) values('$tvalue','$wfvalue','$pvalue','$abvalue','$kvalue','$dvalue')";
	echo "$query<br>";
    $result = mysql_query($query) or die ("couldn't execute query.");
    echo "<b>The following recipe has been uploaded</b><br>";
    echo "Title: $tvalue<br>";
    echo "Wordfile: $wfvalue<br>";
    echo "Pupose: $pvalue<br>";
    echo "Keywords: $kvalue<br>";
    echo "Date Entered: $dvalue<br>";
    echo "Abstract: $abvalue<br>";
    }
   

?>
<p><br>
<a href="upfile.html">Upload another recipe</a>
<p><br>
<a href="index.php">Return to Home Page</a>

</body></html>


