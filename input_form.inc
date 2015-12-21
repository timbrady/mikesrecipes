
<form action="uploadForm.php" method="POST">
<table border=0><tr>
<td>Title:</td><td><input type="text" name="title" size="60"></td></tr>
<tr><td>Abstract:</td><td><textarea name="abstract" col=60 row=5></textarea></td></tr>
<tr><td>Keywords:</td><td><textarea name="keywords" col=60 row=2></textarea></td></tr>
<tr><td>Season:</td><td><input type="checkbox" name="spring" value="spring">Spring<br>
<input type="checkbox" name="summer" value="summer">Summer<br>
<input type="checkbox" name="autumn" value="autumn">Autumn<br>
<input type="checkbox" name="winter" value="winter">Winter<br>
<input type="checkbox" name="year" value="year">Year Around</td></tr></table>
<input type="submit" value="upload">
</form>
