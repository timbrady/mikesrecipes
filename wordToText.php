<html>
<head>
<title>Mike's Recipes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<?php

require "db_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to the database");

echo "<ul>"; 

$query = "SELECT * FROM recipeTable ORDER BY date_entered";
$result = mysql_query($query) or die("couldn't execute query");

while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
EXTRACT($row);
echo "<li><a href=/recipes/"; echo "$wordfile"; echo">$title</a><br>";
$domain = "recipes/";
$filename = $domain.$wordfile;
echo "$recipedocfile"; echo "<br>";

    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    
$rel = "recipes/text/";
    $recipetxt = str_replace(".doc",".txt",$wordfile);
$filename2 = $rel.$recipetxt;
file_put_contents($filename2,$contents);
    echo "$filename2";echo "<br>";
    
    
}




?>

</body>
</html>