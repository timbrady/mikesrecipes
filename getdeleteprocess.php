<html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></head>
<body>
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

$value = $_GET["search"];
$count = $count = $_GET["num"];

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "<h2>Edit a Recipe</h2>";

 $counterstart = $count;
    $counter = 0;
    $nextcounter = $counterstart + 20;
    $prevcounter = $counterstart - 20;

    echo "Search Results for <b>$value</b><br><ul>";
    $counter = $pagenum;

    
    $query = "SELECT title, abstract, wordfile, ((3 *(MATCH (title) AGAINST ('$value')))+(MATCH (abstract) AGAINST ('$value'))) AS score FROM recipeTable WHERE MATCH (title,abstract,wordfile,purpose,keywords) AGAINST ('$value') ORDER BY score DESC";
    
    
    $result = mysql_query($query) or die("couldn't execute query");
    while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
    {
        EXTRACT($row);
        $counter = $counter +1;
        if ($counter > $counterstart)
        {
        echo "<li><font size=+1><a href=/recipes/"; echo "$wordfile"; echo">$title</a> [ <a href=deleteProcess.php?wordfile=$wordfile>Delete</a> ]</font><br>";
        if ($abstract == "")
        {echo "<br>";}
        else {$abstract = utf8_encode($abstract);echo "$abstract<br><br>";}
        }
        if ($counter > $nextcounter)
        { break; }
            }


echo "</ul>";
    
    if ($count > 0) {echo "<a href='getdeleteprocess.php?search=";echo"$value";echo"&num=";echo"$prevcounter";echo"'>Previous 20</a> | ";}
    
    
echo "<a href='getdeleteprocess.php?search=";echo"$value";echo"&num=";echo"$nextcounter";echo"'>Next 20</a><br><br>";
    
echo "
<form action='getdeleteprocess.php' method='get'>
<input type='text' name='search' size=50 value='$value3'>
<input type='hidden' name='num' value='0'>
<input type='submit' value='Search Again'>
</form>
<br>";

echo "<a href='http://www.mikesrecipes.net'>Return to the home page</a>";

echo "</body></html>";

?>





