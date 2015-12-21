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
<title>PHP Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<center>
<img src=/images/mikehome.jpg>


<br><br>
<p>

<form action="advsearchprocess.php" method="POST">
<input type="text" name="searchTerm" size=45>
<select name='purpose'>
<option value='appetizer'> Appetizer</option>
<option value='bread'> Bread</option>
<option value='breakfast'> Breakfast</option>
<option value='lunch'> Lunch</option>
<option value='soup'> Soup</option>
<option value='salad'> Salad</option>
<option value='main'> Main Course</option>
<option value='sauce'> Sauce</option>
<option value='veggie'> Veggie Side</option>
<option value='side'> Side</option>
<option value='dessert'> Dessert</option>
</select>
<input type="submit" value="Search Recipes">
</form>
</center>
<br>
<br>
<b>Planning a menu?</b><br>
<br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=appetizer">Appetizer</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=bread">Bread</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=breakfast">Breakfast</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=lunch">Lunch</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=soup">Soup</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=main">Main Course</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=sauce">Sauce</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=veggie">Veggie Side</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=side">Side</a><br>
<a href="http://www.mikesrecipes.net/getadvsearchprocess.php?purpose=dessert">Dessert</a><br>

<?php

/*
echo "<font face=arial><b>Welcome, {$_SESSION['logname']} ";
*/
?>

</body>
</html>

