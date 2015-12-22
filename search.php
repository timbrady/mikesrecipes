<!DOCTYPE html>
<html><head>
<title>Mike's Recipes</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="../jscript/jquery-ui-1.11.4/themes/smoothness/jquery-ui.css">
  <script src="../jscript/jquery-1.11.1.js"></script>
  <script src="../jscript/jquery-ui-1.11.4/jquery-ui.js"></script>
  
  <style>
	
  	.bold-text {
  	    font-weight: bold;
  		text-decoration: none;
  	}
  </style>

  
<script>
$(function() {
	
	$.widget( "app.autocomplete", $.ui.autocomplete, {
		
	        _renderItem: function( ul, item ) {

	            // Replace the matched text with a custom span. This
	            // span uses the class found in the "highlightClass" option.
	            var re = new RegExp( "(" + this.term + ")", "gi" ),
	                cls = this.options.highlightClass,
	                template = "<span class='" + cls + "'>$1</span>",
	                label = item.label.replace( re, template )
	            return $("<li>") 
     			   .html( label )
                   .appendTo( ul );               
	        }
        
	    });
	
	
  function log( message ) {
    $( "<div>" ).text( message ).prependTo( "#log" );
    $( "#log" ).scrollTop( 0 );
  }

  $( "#search" ).autocomplete({
	highlightClass: "bold-text",
    source: "search_autocomplete.php",
    minLength: 3,
	delay: 200,
    select: function( event, ui ) {
      log( ui.item ?
        "Selected: " + ui.item.value + " aka " + ui.item.id :
        "Nothing selected, input was " + this.value );
    }
  });
});
  </script>	

</head>
<body>

<?php
  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

require "../includes/db_login.inc";

$connection = mysql_connect($host,$user,$password) or die ("couldn't connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to the database");

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
    
?>

<form action="search.php" method="GET" autocomplete="off">
<div class="ui-widget"><input id="search" type="text" name="search" size="65" autocomplete="off" autofocus>
        <input type="hidden" name="num" value="0">
        <input type="submit" value="submit"> </div> 
</form><br>

<?php
echo "</body></html>";

?>
