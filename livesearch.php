<?php
    
    $user="root";
    $host="localhost:3306";
    $password="KvRl2BlhSAM-";
    $database="recipes";
    
    // Fill up array with names
    // get the q parameter from URL
    $q=$_REQUEST["q"]; $hint="";
    
    $connection = mysql_connect($host,$user,$password) or die ("couldn't connect to the server");
    $db = mysql_select_db($database,$connection) or die ("couldn't connect to  the database");
    
    $query = "SELECT * FROM recipeTable WHERE title LIKE '$q%'";
    $result = mysql_query($query) or die("couldnt execute query");
    while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
    {
        EXTRACT($row);

        if ($hint==="")
        { $hint="<option value='" . $title . "'>"; }
        else
        { $hint .= "<option value='" . $title . "'>"; }
    }
    
    // Output "no suggestion" if no hint were found
    // or output the correct values 
    echo $hint==="" ? "no suggestion" : $hint;