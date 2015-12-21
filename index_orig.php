<?php

  session_start();                                          
  if (@$_SESSION['auth'] != "yes")                        
  {
     header("Location: login.php");
     exit();
  }
?>

<html>
<head>
<title>Mike's Recipes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<center>
<img src=/images/mikehome.jpg>


<br><br>
<p>

<form action="searchprocess.php" method="POST">
<input type="text" name="searchTerm" size=65>
<input type="submit" value="Search Recipes">
 [ <a href="upfile.html">Add a Recipe</a> ]
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
<SCRIPT LANGUAGE="JavaScript1.2">
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
</SCRIPT>)

<br><br>


<?

$user="tim";
$host="mysql";
$password="tim";
$database="recipes";

$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to the database");

$query = "SELECT COUNT(title) FROM recipeTable";
$result = mysql_query($query) or die("couldn't execute query");
$row = mysql_fetch_array($result,MYSQL_ASSOC);

foreach ($row as $row_num => $num_value)
{
$latest = $num_value-5;
}

echo "<ul>"; 

$query = "SELECT * FROM recipeTable ORDER BY date_entered LIMIT $latest,5";
$result = mysql_query($query) or die("couldn't execute query");

while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
EXTRACT($row);
echo "<li><a href=/recipes/"; echo "$wordfile"; echo">$title</a><br>";
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

