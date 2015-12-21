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

<?php

require "db_login.inc";


$connection = mysql_connect($host,$user,$password) or die ("couldn't     connect to the server");
$db = mysql_select_db($database,$connection) or die ("couldn't connect to the database");

$query = "SELECT * FROM recipeTable"; 
$result = mysql_query($query) or die("couldn't execute query"); 

while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) 

{ 
EXTRACT($row); 
echo "$title <br>"; }



/*

{
      $recipeDoc = 
      $recipeText = /text/
      wordToText ( 
}

    function wordToText($wordDocPath,$textFilePath){
    	$word = new COM("word.application") or die("Unable to instanciate Word");
    	$word->Visible = 0;
    	$word->Documents->Open($wordDocPath);
    	$numParagraphs = $word->ActiveDocument->Paragraphs->Count;
    	$paraString = '';
    	for($i = 1; $i <= $numParagraphs; $i++){
    		$paraString .= $word->ActiveDocument->Paragraphs[$i];
    	}
    	$word->Quit();
    	$handle = fopen($textFilePath, 'w');
    	fwrite($handle, $paraString);
    	fclose($handle);
    }
    wordToText('http://www.mikesrecipes.net/aaa_test.docx', 'docDump.txt');
    print 'Conversion Complete.';
    ?>
		
*/

</body>
</html>
