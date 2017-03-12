<html>
	<head>
		<script src="//code.jquery.com/jquery.min.js"></script>
    	<script> 
        $(function()
        {
        	$("#tmenu").load("menu.html"); 
        });
    	</script> 
		<link rel="stylesheet" type="text/css" href="normalize.css" />
		<link rel="stylesheet" type="text/css" href="stylesheet/demo.css" />
		<link rel="stylesheet" type="text/css" href="stylesheet/component2.css" />
		<link rel="stylesheet" type="text/css" href="stylesheet/players.css" />
					<link rel="stylesheet" type="text/css" href="normalize.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/demo.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/component2.css" />
	<script src="modernizr-2.6.2.min.js"></script>


	</head>
	<body>
		<div id="header">
			<div id="ipllogo">
        	</div>
        	<div id="teamlogo">
            	<?php
            	if(!isset($_SESSION))
            	{
            		session_start();
            	}
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
			<?php

                    
$host="localhost";
	
$usr="root";
$pass="";
$con=mysql_connect($host,$usr,$pass);
mysql_select_db('ipl');
        
				$cplayer=0;
				$query_count="select counter from tempcount";
				$r=mysql_query($query_count);
				while($res=mysql_fetch_row($r))
				{
					$count=$res[0];
				}
					$query_fetchplayer="select PImage from players where PlayerId>$count";
				//	echo $query_fetchplayer;
					$r2=mysql_query($query_fetchplayer);
					while($res2=mysql_fetch_row($r2))
					{
							$img[$cplayer]=$res2[0];
							$cplayer++;
					}

			?>
			<div class="container">
				<div class="p1">

					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[0]).'" style="border-radius:60%;"  />'; ?>
				</div>

				<div class="p1">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[1]).'" style="border-radius:60%;" />'; ?>
	
				</div>
				
				<div class="p1">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[2]).'" style="border-radius:60%;"  />'; ?>
	
				</div>
			</div>
			<div class="container">

				<div class="p2">

					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[3]).'" style="border-radius:60%;" />'; ?>
				</div>

				<div class="p2">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[4]).'" style="border-radius:60%;" />'; ?>
	
				</div>
				
				<div class="p2">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[5]).'"style="border-radius:60%;"  />'; ?>
			</div>
			</div>
			<div class="container">

				<div class="p3">

					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[6]).' " style="border-radius:60%;"  />'; ?>
				</div>

				<div class="p3">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[1]).'" style="border-radius:60%;" />'; ?>
	
				</div>
				
				<div class="p3">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[0]).'"  style="border-radius:60%;" />'; ?>
			</div>
			</div>
		</div>
		<div class="component">
		<button class="cn-button" id="cn-button">Menu</button>
		<div class="cn-wrapper" id="cn-wrapper">
			<ul>
				<li><a href="team_details.php"><span>Team <br> Details</span></a></li>
				<li><a href="teams.php"><span>Teams</span></a></li>
				<li><a href="#"><span>Sold <br> Players</span></a></li>
				<li><a href="bid.php"><span>Home</span></a></li>
				<li><a href="playerstocome.php"><span>Players <br> To Come</span></a></li>			
			</ul>
		</div>			
		<!--</div>-- /container -->
	<script src="demo2.js"></script>
		<!-- For the demo ad only -->   
		</div>		
		<!--</div>-- /container -->
		<script src="polyfills.js"></script>
		<script src="demo2.js"></script>
		<!-- For the demo ad only -->   
	</body>
</html>