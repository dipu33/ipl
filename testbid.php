<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
  <script src="//code.jquery.com/jquery.min.js"></script>
    <script> 
        $(function(){
          $("#tmenu").load("menu.html"); 
		  
        });
    </script> 

    <link href="aaaacss.css" rel="stylesheet" type="text/css" />
</head>


<script>
function fun()
{
	var idb=document.getElementById("su");
	if(idb.value=="ready"){
		idb.value="not ready";	
	}
		else if(idb.value=="not ready")
		{
				idb.value="ready";
		}
			var x="dipak";
	var xhttp=new XMLHttpRequest();
	xhttp.onreadystatechange=function(){
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("dipak").innerHTML = xhttp.responseText;

	
	
	}
};
alert(x);
	
xhttp.open("GET", "php.php?q=" + idb.value,true);
xhttp.send();

}
</script>
<script type="text/javascript">
var sec=10;
function timer()
{
	//alert("id1");
	var element=document.getElementById("timer1");
	element.innerHTML= "please wait for "+sec+"seconds";
	
		sec--;
	if(sec>=0){
	setTimeout(timer,1000);
	}
}
</script>

<script type="text/javascript">
var i="1";
function  divisionmake()
{
	alert("sad");
	var ele=document.createElement('div');
		ele.id=i;
	//ii++;
	document.body.appendChild(ele);
	document.getElementById(ele.id).style.height="100px";
	document.getElementById(ele.id).style.height="100px";
		
	document.getElementById(ele.id).style.width="100px";
	document.getElementById(ele.id).style.backgroundColor="yellow";
	alert(ele.id);
	document.getElementById(ele.id).style.cssFloat="left";
		
	document.getElementById(ele.id).style.marginLeft="100px";
	document.getElementById(ele.id).style.marginTop="100px";
	document.getElementById(ele.id).style.position="relative";
	i++;
}
</script>
<body>

<div id="header">

</div>
<div class="oo">
<div id="timer1" >
</div>
<div class="sp">
<div id="aq">
<table style="border:1px solid black" id="mytable">
<tr>
<th>id</th>
<th>username</th>
<th>country</th>
</tr>
<?php
//$_SESSION['usrr']="dipak";
//echo $_SESSION['usrname'];
$host="localhost";
$usr="root";
$pass="";
$con=mysql_connect($host,$usr,$pass);
mysql_select_db('test');


$i=0;
$num=range(1,7);
shuffle($num);
for($j=0;$j<5;$j++){			

$str_usercount="select *from  currentlogin where id=$num[$j];";
//echo $str_usercount;
	$res=mysql_query($str_usercount,$con) or die("errorssssssssssssssss");
while($raw=mysql_fetch_row($res))
{
	/*$s3=$raw[0];
	$s=$raw[1];
	$s2=$raw[2];
  	*/
	
	echo "<script type='text/javascript'> divisionmake()</script>"; 
	
}
	
	}
?>
</table>
</div>
</div>
<div id="ready" style="background-color:#F00; height:auto; width:auto; position:fixed; margin-top:200px;"><input type="button" name="submit" id="su" value="ready" onclick="fun();"/>


</form>	
</div>
</div>
</div>
<p>asd</p>	
</body>
</html>