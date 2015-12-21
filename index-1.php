
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
<title>Imagine K12 Internal</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script>
function showResult(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","livesearch.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
<center>
<br><br>
<img width='300' src=/img/imaginek12.png>


<br><br>
<p>

<form action="searchprocess.php" method="GET" autocomplete="off">
	<input list="txtHint" type="text" name="search" size="80" onkeyup="showResult(this.value)">
     <datalist id="txtHint"></datalist>
        <input type="hidden" name="num" value="0">
        <input type="submit" value="submit">
&nbsp;&nbsp;<a href=''>Add</a>
</form>
</center>
<br>
<br>


</body>
</html>