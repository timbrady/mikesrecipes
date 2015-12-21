<!DOCTYPE html>
<html><head>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }
?>

<title>Mike's Recipes</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script>
function showHint(str)
{
    if (str.length==0)
    {
        document.getElementById("txtHint").innerHTML="";
        return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
}
</script>
</head>
<body>

<?php
$user="root";
$host="localhost:3306";
$password="KvRl2BlhSAM-";
$database="recipes";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");

    $value = $_GET["search"];
    $count = $_GET["num"];
     
    $value = htmlspecialchars ($value,ENT_QUOTES);

    echo "<table border=0 width=100%><tr><td align=left>
	<img src=/images/small_graphic.jpg></td><td align=right>
	Recipes: <a href=upfile.html>Add</a> , <a href='getdeleteprocess.php?search=";
	echo "$value"; 
	echo "&num="; 
	echo "$count";
	echo "'>Delete</a> , <a href='geteditprocess.php?search="; 
	echo "$value"; 
	echo "&num="; 
	echo "$count"; 
	echo "'>Edit</a></td></tr>
	<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

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
        echo "<li><font size=+1><a href=/recipes/"; echo "$wordfile"; echo">$title</a></font><br>";
        if ($abstract == "")
        {echo "<br>";}
        else {$abstract = utf8_encode($abstract);echo "$abstract<br><br>";}
        }
        if ($counter > $nextcounter)
        { break; }
        
    }


echo "</ul>";
    
    if ($count > 0) {echo "<a href='searchprocess3.php?search=";echo"$value";echo"&num=";echo"$prevcounter";echo"'>Previous 20</a> | ";}
    
    
echo "<a href='searchprocess3.php?search=";echo"$value";echo"&num=";echo"$nextcounter";echo"'>Next 20</a><br><br>";
    
echo "<form action='search.php' method='GET' autocomplete='off'>
	<input list='txtHint' type='text' name='search' size='65' onkeyup='showHint(this.value)'>
    <datalist id='txtHint'><option value=' '>
    </datalist>
</form>
<br>";



echo "</body></html>";

?>





