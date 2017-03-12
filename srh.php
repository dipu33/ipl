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
		<script src="modernizr-2.6.2.min.js"></script>
	</head>
	<style>
		#section{
				background-image:url(images/srhbg.jpg);
				background-repeat: no-repeat;
				background-size: 100%;
				
		}
	</style>
	<body>
		<div id="header">
			<div id="ipl_logo">
        	</div>
        	<div id="team_logo">
        		<?php
if(!isset($_SESSION))         			{
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
        	<div id="team_name">
            	<?php echo $teamname; ?>
        	</div>
		</div>
		<div id="section" >

			<?php

                    
$host="localhost";
	
$usr="root";
$pass="";
$con=mysql_connect($host,$usr,$pass);
mysql_select_db('ipl');
        
				$cplayer=0;
				$t=0;
				$query_select="select PlayerId from srh";
				$r=mysql_query($query_select);
				while($res=mysql_fetch_row($r))
				{
				
					$count[$t]=$res[0];					
					$t++;
						$query_fetchplayer="select PImage from players where PlayerId=$res[0]";
					
					$r2=mysql_query($query_fetchplayer);
					while($res2=mysql_fetch_row($r2))
					{
							$img[$cplayer]=$res2[0];
							$cplayer++;
					}							
					}
					
					?>
			<div class="container">
				<div class="pimage">

					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[0]).'" style="border-radius:60%;"  />'; ?>
				</div>

				<div class="pimage">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[1]).'" style="border-radius:60%;" />'; ?>
	
				</div>
				
				<div class="pimage">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[2]).'" style="border-radius:60%;"  />'; ?>
	
				</div>
			</div>
			<div class="container">

				<div class="pimage">

					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[3]).'" style="border-radius:60%;" />'; ?>
				</div>

				<div class="pimage">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[4]).'" style="border-radius:60%;" />'; ?>
	
				</div>
				
				<div class="pimage">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[5]).'"style="border-radius:60%;"  />'; ?>
			</div>
			<div class="container">

				<div class="pimage">

					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[6]).' " style="border-radius:60%;"  />'; ?>
				</div>

				<div class="pimage">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[1]).'" style="border-radius:60%;" />'; ?>
	
				</div>
				
				<div class="pimage">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img[0]).'"  style="border-radius:60%;" />'; ?>
			</div>
			<div class="container">
			</div>
			
		</div>
		<div id="tmenu">
		</div>		
		<!--</div>-- /container -->
		<script src="polyfills.js"></script>
		<script src="demo2.js"></script>
		<!-- For the demo ad only -->   
	</body>
</html>