
<html>
<head>
<title>PHP Test</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<script>
function showResult(str)
{
    if (str.length==0)
    {
        document.getElementById("txtHint").innerHTML="";
        return;
    }

    var xmlhttp=new XMLHttpRequest();
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
<img src=/images/mikehome.jpg>

<br><br><p>

<form  action="searchprocess3.php" method="get" autocomplete="off">
<input type="text" size="30" name="search"  list="txtHint" onkeyup="showResult(this.value)">
<datalist id="txtHint"></datalist>
</form>


</center>

</body>
</html>

