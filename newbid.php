<?php
		session_start()
	?>
<html>
<head>
	
     <script src="//code.jquery.com/jquery.min.js"></script>
    <script> 
        $(function(){
          $("#tmenu").load("menu.html"); 
		  
        });
    </script> 

    <link rel="stylesheet" type="text/css" href="normalize.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/demo.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/component2.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/newbid.css" />
	
        <script src="modernizr-2.6.2.min.js"></script>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-7243260-2']);
		_gaq.push(['_trackPageview']);
		(function() 
		{
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>

<script type="text/javascript">
	var sec=10;
	window.onload=function()
	{
		timer();
	}

	function timer()
	{
		var xhttp=new XMLHttpRequest();
		xhttp.onreadystatechange=function()
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200)
		    {				                
				var jsonObj = JSON.parse(xhttp.responseText);
		    	document.getElementById("time").innerHTML = jsonObj.first;
			  	document.getElementById("pimage").innerHTML = jsonObj.second;
				document.getElementById("currentbid").innerHTML = jsonObj.third;
				document.getElementById("nextbid").innerHTML = jsonObj.fourth;
				document.getElementById("section1").innerHTML = jsonObj.fifth;
			}
		};
		xhttp.open("GET", "dmasd.php",true);
		xhttp.send();
		setTimeout(timer,1000);	
	}	

	function bid()
	{
		var xhttp=new XMLHttpRequest();
		xhttp.onreadystatechange=function()
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {
			    // var jsonObj = JSON.parse(xhttp.responseText);
//			    document.getElementById("section2").innerHTML = jsonObj.first;
		   //document.getElementById("pimage").innerHTML = jsonObj.second;
			//document.getElementById("currentbid").innerHTML = jsonObj.first;
			//document.getElementById("nextbid").innerHTML = jsonObj.third;
			}
		};
		xhttp.open("GET", "tests.php",true);
		xhttp.send();
	}
</script>

<body>
	<div id="header">
		
		<div id="ipllogo">
		</div>

		<div id="teamlogo">
			<?php
				$tcode=$_SESSION["TeamCode"];
				$host="localhost";
				$usr="root";
				$pass="";
				$con=mysql_connect($host,$usr,$pass);
				mysql_select_db('ipl');
				$str="select TLogo,TeamName from teams1 where TeamCode=$tcode";
				$res=mysql_query($str);
				while($raw=mysql_fetch_row($res))
				{	
					$teamlogo=$raw[0];
					$teamname=$raw[1];
					echo '<img src="data:image/jpeg;base64,'.base64_encode($teamlogo).'" style=" border-radius:60%; height:150px;   width:150px;"/>';
				}
			?>
		</div>

		<div id="teamname">
			<?php
				echo $teamname;
			?>
		</div>

	</div>
	
	<div id="aside">
	</div>

	<div id="section1">
	</div>

	<div id="section2">
	</div>

	<div id="section3">
		
		<div id="pimage" style="height:150px; width:100px; margin-top:-10%;">
  			<p>wait for other owners to  Login</p>
    	</div>

    	<div id="pstatics" style="margin-left:20%; margin-top:-10%; height:150px; background-size:contain; width:150px;">
    		<table id="table1" style="border:3px solid black; background-color:white; color:black; ">
    			<tr>
    				<td>player name</td>
    				<td>sachin tendulkar</td>
   				</tr>
    			<tr>
			    	<td>type</td>
    				<td>right</td>
    			</tr>
    		</table>
    	</div>

    	<div id="bidarea" style="float:right; margin-right:15%; ">
   		
   			<div id="time">
    		</div>

    		<div id="currentbid">
    			<p>sad</p>
    		</div>

    		<div id="nextbid">
    			<p>asd</p>
    		</div>
    		<input type="button" value="click here for bid" onClick="bid();">
    	</div>
    </div>

    <div class="component">
		<button class="cn-button" id="cn-button">Menu</button>
		<div class="cn-wrapper" id="cn-wrapper">
			<ul>
				<li><a href="#"><span onClick="testteam();">Team <br> Details</span></a></li>
				<li><a href="#"><span>Teams</span></a></li>
				<li><a href="#"><span>Sold <br> Players</span></a></li>
				<li><a href="#"><span>Stats</span></a></li>
				<li><a href="#"><span>Players <br> To Come</span></a></li>			
			</ul>
		</div>		
	</div>		
		<!--</div>-- /container -->
	<script src="polyfills.js"></script>
	<script src="demo2.js"></script>
		<!-- For the demo ad only -->   
	<script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
</body>
</html>