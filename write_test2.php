<?php

// get contents of a file into a string
$filename = "recipes/Almond_Kringler.doc";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
echo "$contents";
$contents2 = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$contents);
echo "<br><br><br>$contents2";
$filename2 = "recipes/text/Almond_Kringler.txt";
file_put_contents($filename2,$contents);

 ?>