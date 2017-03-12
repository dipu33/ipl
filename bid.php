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
    <link rel="stylesheet" type="text/css" href="stylesheet/bid.css" />

<!--	<link rel="stylesheet" type="text/css" href="normalize.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/demo.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/component2.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/bid.css" />
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
-->
</head>
 <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
           
               $('#tmenu').load('menu.html');
            });
         });
      </script>
<script type="text/javascript">
	var sec=10;
	window.onload=function()
	{
	  
		timer();
		$("#tmenu").load("menu.html");
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
			  	document.getElementById("playerimage").innerHTML = jsonObj.second;
				document.getElementById("cbidder").innerHTML = jsonObj.third;
				document.getElementById("pname").innerHTML=jsonObj.sixth;

				document.getElementById("nation").innerHTML=jsonObj.seven;
				document.getElementById("type").innerHTML=jsonObj.eight;
				document.getElementById("capped").innerHTML=jsonObj.nine;
				document.getElementById("baseprice").innerHTML=jsonObj.ten;
			    document.getElementById("rbudget").innerHTML = jsonObj.eleven;
	 			 



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
			  var jsonObj = JSON.parse(xhttp.responseText);
			     document.getElementById("cbid").innerHTML = jsonObj.first;

	  			    document.getElementById("nbid").innerHTML = jsonObj.third;

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

		<div id="teamlogo" >
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
			<p><?php
				echo $teamname;
			?></p>
		</div>

	</div>

	<div id="section">
		
		<div id="player">
			<div id="playerimage" >
			</div>
			<div id="playerinfo">
				<div class="playerdetails" >
					<table class="zui-table zui-table-rounded">
						<tr>
							<th>NAME</th>
						</tr>
						<tr>
							<td id="pname"></td>
						</tr>
					</table>
				</div>
				<div class="playerdetails">
					<table class="zui-table zui-table-rounded">
						<tr>
							<th>NATIONALITY</th>
						</tr>
						<tr>
							<td id="nation"></td>
						</tr>
					</table>
				</div>
				<div class="playerdetails">
					<table class="zui-table zui-table-rounded">
						<tr>
							<th>STYLE</th>
						</tr>
						<tr>
							<td id="type"></td>
						</tr>
					</table>
				</div>
				<div class="playerdetails">
					<table class="zui-table zui-table-rounded">
						<tr>
							<th>CAPPED?</th>
						</tr>
						<tr>
							<td id="capped"></td>
						</tr>
					</table>
				</div>
				<div class="playerdetails">
					<table class="zui-table zui-table-rounded">
						<tr>
							<th>BASE PRICE</th>
						</tr>
						<tr>
							<td id="baseprice"></td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>

		<div id="bidding">
			<div id="franchise_overview">
				<div id="budget">
					<table class="zui-table zui-table-rounded">
						<tr>
							<th>REMAINING BUDGET</th>
						</tr>
						<tr>
							<td id="rbudget"></td>
						</tr>
					</table>
				</div>
				<div id="total_players">
					<?php
							$team=$_SESSION["TeamName"];
							$query_sid="select Batsman,Bowler,AllRounder,WicketKeeper from teams_details where TeamName='$team'";
							$result=mysql_query($query_sid);
							while($r=mysql_fetch_row($result))
							{
								$bats=$r[0];
								$bow=$r[1];
								$alr=$r[2];
								$wck=$r[3];
							}
					?>
					<table class="zui-table zui-table-rounded">
						<tr>
							<th colspan="4">TOTAL PLAYERS</th>
						</tr>
						<tr>
							<td><img src="images/bats.png" style="height:30px ; width:30px;"></td>
							<td><img src="images/bolwer.png" style="height:30px ; width:30px;"></td>
							<td><img src="images/wicket.png" style="height:30px ; width:30px;"></td>
							<td><img src="images/bats2.png" style="height:30px ; width:30px;"></td>
						</tr>
						<tr>
							<td><?php echo $bats ?></td>
							<td><?php echo $bow ?></td>
							<td><?php echo $alr ?></td>
							<td><?php echo $wck ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div id="bid_info"> 	
    			<div id="currentbid">
    				<table class="zui-table zui-table-rounded">
						<tr>
							<th>Current Bid</th>
						</tr>
						<tr>
							<td id="cbid"></td>
						</tr>
					</table>
    			</div>
    			<div id="middlecontainer">
    				<div id="timer">
    					<table class="zui-table zui-table-rounded">
							<tr>
								<th>Timer</th>
							</tr>
							<tr>
								<td id="time"></td>
							</tr>
						</table>
    				</div>
    				<div id="bidbutton">
    					<input class="mybutton" type="button" value="Bid Now!" onClick="bid();">
    				</div>
    				<div id="nextbid">
    					<table class="zui-table zui-table-rounded">
							<tr>
								<th>Next Bid</th>
							</tr>
							<tr>
								<td id="nbid"></td>
							</tr>
						</table>
    				</div>
    			</div>
    			<div id="currentbidder">
    				<table class="zui-table zui-table-rounded">
						<tr>
							<th>Current Bidder</th>
						</tr>
						<tr>
							<td id="cbidder"></td>
						</tr>
					</table>
				</div>
    		</div>
    	</div>
			<!--?php
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
			?-->
			<!--/div-->
	</div>

    <div id="footer">
    </div>
    <div id="tmenu">	
	</div>		
		<!--</div>-- /container -->
	<script src="polyfills.js"></script>
	<script src="demo2.js"></script>
</body>
</html>