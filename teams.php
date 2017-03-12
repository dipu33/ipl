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
    <link rel="stylesheet" type="text/css" href="stylesheet/bid.css" />

	<link rel="stylesheet" type="text/css" href="stylesheet/component2.css" />
	<link rel="stylesheet" type="text/css" href="stylesheet/teams.css" />
	<script src="modernizr-2.6.2.min.js"></script>
</head>

<body>
	<div id="header">
		<div id="ipl_logo">
        </div>
        <div id="team_logo">
           <?php
           	session_start();
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
	<div id="section">
		<div class="container">
			<div class="teamlogos">
                            				<a href="gl.php"><img src="images/gujrat.png"></a>

			</div>

                    <div class="teamlogos">
						<a href="kxp.php"><img src="images/punjab.png"></a>

                    </div>
			<div class="teamlogos">
						<a href="rps.php"><img src="images/pune.png"></a>

                        </div>
			<div class="teamlogos">
							<a href="dd.php"><img src="images/delhi.png"></a>

                        </div>
		</div>
		<div class="container">
			<div class="teamlogos">
								<a href="srh.php"><img src="images/hyderabad.png" ></a>
			</div>
			<div class="teamlogos">
								<a href="kkr.php"><img src="images/kolkata.png"></a>

			</div>
			<div class="teamlogos">
								<a href="rcb.php"><img src="images/benglor.png"></a>

			</div>
			<div class="teamlogos">
								<a href="mi.php"><img src="images/mumbai.png"></a>

			</div>
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