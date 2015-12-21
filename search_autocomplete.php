<?php

	$q = $_GET["term"];
	
    require "db_login.inc";

	$connection = mysqli_connect($host,$user,$password) or die ("couldn't connect to the server");
	$db = mysqli_select_db($connection,$database) or die ("couldn't connect to the database");
    
	$items = array();
	$query = "SELECT title FROM recipeTable WHERE title LIKE '%$q%'";
	$result = mysqli_query($connection,$query) or die("couldnt execute query");
	while ($row = mysqli_fetch_array($result,MYSQL_NUM)){
	      array_push($items,$row[0]);
	  	  if (count($items) > 15)
	  	    	break;
	}
    
	// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
	echo json_encode($items);
	?>