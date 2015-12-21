<?php
    // Fill up array with names

      include ("recipe_list.inc");
    
    // get the q parameter from URL
    $q=$_REQUEST["q"]; $hint="";
    
    // lookup all hints from array if $q is different from ""
    if ($q !== "")
    { $q=strtolower($q); $len=strlen($q);
        foreach($a as $name)
        { if (stristr($q, substr($name,0,$len)))
        { if ($hint==="")
        { $hint="<option value='" . $name . "'>"; }
        else
        { $hint .= "<option value='" . $name . "'>"; }
        }
        }
    }
    
    // Output "no suggestion" if no hint were found
    // or output the correct values 
    echo $hint==="" ? "no suggestion" : $hint;