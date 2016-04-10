<?php
  session_start();                                          
  if (@$_SESSION['auth'] != "yes")                        
  {
     header("Location: login.php");
     exit();
  }
  ?>

<!DOCTYPE html>
<html>
<head>

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
	
<center>
<img src=/images/mikehome.jpg>
<br><br>
<p>

<form action="search.php" method="GET" autocomplete="off">

<div class="ui-widget"><input id="search" type="text" name="search" size="65" autocomplete="off" autofocus>
        <input type="hidden" name="num" value="0">
        <input type="submit" value="submit"> </div> 
		
		<a href="upfile.html">Add a Recipe</a> 
</form>
</center>
<br>
<br>
 	  
<?php
/*
echo "<font face=arial><b>Welcome, {$_SESSION['logname']} ";
*/
?>

<b>Recently added Recipes</b> (Today is

<script>
<!-- Begin
var months=new Array(13);
months[1]="January";
months[2]="February";
months[3]="March";
months[4]="April";
months[5]="May";
months[6]="June";
months[7]="July";
months[8]="August";
months[9]="September";
months[10]="October";
months[11]="November";
months[12]="December";
var time=new Date();
var lmonth=months[time.getMonth() + 1];
var date=time.getDate();
var year=time.getYear();
if (year < 2000)
year = year + 1900;
document.write(lmonth + " ");
document.write(date + ", " + year);
// End -->
</SCRIPT>) <br><br>


<?php

require "recipe_login.inc";

$connection = mysqli_connect($host,$user,$password) or die ("couldn't connect to this server");
$db = mysqli_select_db($connection,$database) or die ("couldn't connect to the database");

$query = "SELECT COUNT(title) FROM recipeTable";
$result = mysqli_query($connection,$query) or die("couldn't execute query");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    

foreach ($row as $row_num => $num_value)
{
$latest = $num_value-5;
}

echo "<ul>"; 

$query = "SELECT * FROM recipeTable ORDER BY date_entered LIMIT $latest,5";
$result = mysqli_query($connection,$query) or die("couldn't execute query");

while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
EXTRACT($row);
echo "<li><font size=+1><a href=/recipes/"; echo "$wordfile"; echo">$title</a></font><br>";
if ($abstract == "")
    {echo "<br>";}
   else {echo "$abstract<br><br>";}
}

echo "</ul>";

echo "Find recipes added in: ";
echo " <a href='searchrecent.php?recent=10'>Last 10 days</a> ";
echo " , <a href='searchrecent.php?recent=30'>Last 30 days</a> ";
echo " , <a href='searchrecent.php?recent=60'>Last 60 days</a><br><br>";

echo "<b>Browse Recipes:</b> ";
echo "<a href='browse.php?purpose=appetizer'>Appetizers</a>, ";
echo "<a href='browse.php?purpose=bread'>Breads</a>, ";
echo "<a href='browse.php?purpose=breakfast'>Breakfast</a>, ";
echo "<a href='dessert.php?purpose=dessert'>Desserts</a>, ";
echo "<a href='browse.php?purpose=lunch'>Lunch</a>, ";
echo "<a href='main_course.php'>Main Courses</a>, ";
echo "<a href='browse.php?purpose=salad'>Salads</a>, ";
echo "<a href='browse.php?purpose=sauce'>Sauces</a>, ";
echo "<a href='browse.php?purpose=soup'>Soups</a>, ";
echo "<a href='browse.php?purpose=veggie'>Vegetables</a>, ";
echo "<a href='browse.php?purpose=technique'>Cooking Techniques</a>, <br><br>";

echo "<b>Browse Recipes: </b><a href='/tm/curriculum.html'>Tim's six-month culinary course</a>";


?>

</body>
</html>