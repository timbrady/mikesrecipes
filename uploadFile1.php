<html><head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></head><body>
<?php

  session_start();  
  if (@$_SESSION['auth'] != "yes")                   
  {
     header("Location: login.php");
     exit();
  }

echo "<table border=0 width=100%><tr><td align=left>";
echo "<img src=/images/small_graphic.jpg></td><td align=right>";
echo "Recipes: <a href=upfile.html>Add</a> , <a href=delete_start.html>Delete</a> , <a href=edit_start.html>Edit</a>";
echo "</td></tr>";
echo "<tr><td colspan=2 width=100%><img src=/images/blue_pixel.jpg height=2 width=100%></td></tr></table><br>";

echo "<font size=+1>Tante Marie Database Upload Form</font><br><br>";

    echo "<form action='uploadForm.php' method='POST'>
    <table border=0>
<tr>
    <td>File Name:</td><td><input type='text' name='wordfile' value='$final_name' size='60'></td></tr>
<tr>
    <td>Title:</td><td><input type='text' name='title' value='$final_title'   size='60'></td></tr>
    <tr><td>Abstract:</td><td><textarea name='abstract' cols=75 rows=10></textarea></td></tr>
    <tr><td>Purpose:</td><td>

<select name='purpose'>
<option value='appetizer'>Appetizer</option>
<option value='bread'>Bread</option>
<option value='breakfast'>Breakfast</option>
<option value='lunch'>Lunch</option>
<option value='soup'>Soup</option>
<option value='salad'>Salad</option>
<option value='main'>Main Course</option>
<option value='sauce'>Sauce</option>
<option value='veggie'>Veggie Side</option>
<option value='side'>Side</option>
<option value='dessert'>Dessert</option>
</select>


</td></tr>
<tr><td>Keywords:</td><td><textarea name='keywords' col=100 row=2></textarea></td></tr></table>
<input type='submit' value='upload'></form>";


?>
</body>
</html>




