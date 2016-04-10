<html><head>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

   ?>

<title>Mikes Recipes</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head><body><table border=0 width='100%'><tr><td align=left>
<img src="/images/small_graphic.jpg"></td><td align=right>
Recipes: <a href="upfile.html">Add</a> , <a href="delete_start.html">Delete</a> , <a href="geteditprocess.php?search=$value">Edit</a></td></tr>
<tr><td colspan=2 width="100%"><img src="/images/blue_pixel.jpg" height=2 width="100%"></td></tr></table><br>
    
<?php
    
 require "recipe_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

    
    foreach ($_POST as $field => $value)
    {
        $search = "%$value%";
    }

$cleansearch = trim($search);
$part_count = substr_count($cleansearch," ");
$searchparts = explode(" ",$cleansearch);
$search1 = "%$searchparts[0]%";
$search2 = "%$searchparts[1]%";
$search3 = "%$searchparts[2]%";
$pair1 = "%$searchparts[0] $searchparts[1]%";
$pair2 = "%$searchparts[1] $searchparts[2]%";

echo "Search Results for <b>$value</b><br><ul>";
$counter = 0;
$query = "SELECT title,wordfile,abstract,MATCH (title,abstract,purpose,keywords) AGAINST ('$value') AS score FROM recipeTable WHERE MATCH (title,abstract,purpose,keywords) AGAINST ('$value') ORDER BY score DESC"; 
$result = mysql_query($query) or die("couldn't execute query");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
EXTRACT($row);
    $counter = $counter +1;
echo "<li><a href=/recipes/"; echo "$wordfile"; echo">$title</a><br>";
if ($abstract == "")
    {echo "<br>";}
else {echo "$abstract<br><br>";}
if ($counter == 20)
{ break; }

}
    
echo "</ul>";

echo "<form action='searchprocess2.php?searchTerm=$value' method='GET'><input type='text' name='searchTerm' size=50 value='$value'><input type='submit' value='Search Again'></form><br>";

echo "</body></html>";

?>





