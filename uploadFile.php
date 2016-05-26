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

  if($_FILES['user_file']['tmp_name'] == "none")
    {
    echo "<b>File did not successfully upload.  Check the file size.  Files
    must be less than 500k.</b><br>";
    include("upfile.inc");
    exit();
    }
   else
    {
    $temp_file = $_FILES['user_file']['tmp_name'];
	$error = $_FILES['user_file']['error'];
	echo "$error<br>";
	$size = $_FILES['user_file']['size'];
	echo "SIZE $size<br>";
    $name = $_FILES['user_file']['name'];
    $name2 = str_replace("è","e",$name);
    $name2 = str_replace("é","e",$name2);
    $name2 = str_replace("ê","e",$name2);
    $name2 = str_replace("î","i",$name2);
    $name2 = str_replace("û","u",$name2);
    $name2 =stripslashes($name2);
    $name2 = trim($name2);
    $lc_name = strtolower($name2);
    $c_name = ucwords($lc_name);
    $final_name1 = str_replace("'","",$c_name);
    $final_name = ereg_replace(" ","_",$final_name1);

    $final_title = ereg_replace(".doc","",$final_name1);

    $destination = "recipes/$final_name";
    chmod($temp_file , 0777);
	echo "$temp_file<br>$destination";
    $desty = move_uploaded_file($temp_file,$destination);
    if ($desty == TRUE)
    {
    echo "<p><b>The file has successfully uploaded:</b> $final_name
       {$_FILES['user_file']['size']}</p>";
    }
    else
    {
        echo "<p><b>Couldn't upload file<br>";
    }

    echo "<form action='uploadForm.php' method='POST'>
    <input type='hidden' name='wordfile' value='$final_name'>
    <table border=0><tr>
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
<option value='technique'>Cooking Technique</option>
</select>


</td></tr>
<tr><td>Keywords:</td><td><textarea name='keywords' col=100 row=2></textarea></td></tr></table>
<input type='submit' value='upload'></form>";

    }

?>
</body>
</html>



