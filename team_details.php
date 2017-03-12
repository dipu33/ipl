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
	<link rel="stylesheet" type="text/css" href="stylesheet/team_details.css" />
	<script src="modernizr-2.6.2.min.js"></script>
</head>
<script type="text/javascript">
function fun(iid){
    alert(iid);
    var tb=document.getElementById("tbl");
        var r=tb.getElementsByTagName("tr");
	var t=tb.getElementsByTagName("td");
       
        for(var i=1;i<r.length;i++)
        {
                if(i==iid)
                {
                    r[i].style.backgroundColor="#FF0000";  
                    alert("yes");
                }
                
        }
        
}    
</script>

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
            <div id="team_name" style="color:#c0c0c0">
                <?php echo $teamname; ?>
            </div>

        </div>
	</div>
	<div id="section">
        <div class="logo_container">
            <img src="images/KXIP.jpg" class="image-responsive" id="1" alt="KXIP" onmouseover="fun(this.id);"  >
            <img src="images/mi.jpg" class="image-responsive"   id="2" alt="MI" onclick="animate1(this.id);">
            <img src="images/rps.jpg" class="image-responsive"  id="3" alt="RPS" onclick="animate1(this.id);">
            <img src="images/kkr.jpg" class="image-responsive"  id="4" alt="KKR" onclick="animate1(this.id);">
        </div>
		<table class="zui-table zui-table-rounded" id="tbl">
    		<thead>
        		<tr>
            		<th>Franchise</th>
            		<th>Total Players</th>
            		<th>Foreign Players</th>
            		<th>Uncapped Players</th>
                        <th>Batsmen</th>
                        <th>Bowlers</th>
                        <th>All Rounders</th>
                        <th>Wicket Keepers</th>
            	 	<th>Reamining Budget</th>
        		</tr>
    		</thead>
    		<tbody>
                    <?php       
                    
                    
$host="localhost";
	
$usr="root";
$pass="";
$con=mysql_connect($host,$usr,$pass);
mysql_select_db('ipl');
                    $count=0;
                        $query_selectplayer="select *from teams_details ";
                       
                        $r=mysql_query($query_selectplayer);
                        $i=0;
                        while($row=mysql_fetch_row($r))
                          {
                            $fr[$i]=$row[0];
                            $tplayer[$i]=$row[1];
                            $fp[$i]=$row[2];
                            $uc[$i]=$row[3];
                            $bats[$i]=$row[4];
                            $bowl[$i]=$row[5];
                            $all[$i]=$row[6];
                            $wc[$i]=$row[7];
                            $rb[$i]=$row[8];
                            $i++;
                        }
                    ?>
                    <tr >
            		<td><?php echo $fr[0]?></td>
            		<td><?php echo $tplayer[0]?></td>
            		<td><?php echo $fp[0]?></td>
            		<td><?php echo $uc[0]?></td>
                    <td><?php echo $bats[0]?></td>
                    <td><?php echo $bowl[0]?></td>
                    <td><?php echo $all[0]?></td>
                    <td><?php echo $wc[0]?></td>
            		<td><?php echo $rb[0]?></td>
        		</tr>
                    <tr>
                    <td><?php echo $fr[1]?></td>
                    <td><?php echo $tplayer[1]?></td>
                    <td><?php echo $fp[1]?></td>
                    <td><?php echo $uc[1]?></td>
                    <td><?php echo $bats[1]?></td>
                    <td><?php echo $bowl[1]?></td>
                    <td><?php echo $all[1]?></td>
                    <td><?php echo $wc[1]?></td>
                    <td><?php echo $rb[1]?></td>
                </tr>
                    <tr >
                    <td><?php echo $fr[2]?></td>
                    <td><?php echo $tplayer[2]?></td>
                    <td><?php echo $fp[2]?></td>
                    <td><?php echo $uc[2]?></td>
                    <td><?php echo $bats[2]?></td>
                    <td><?php echo $bowl[2]?></td>
                    <td><?php echo $all[2]?></td>
                    <td><?php echo $wc[2]?></td>
                    <td><?php echo $rb[2]?></td>
                </tr>
                    <tr >
                    <td><?php echo $fr[3]?></td>
                    <td><?php echo $tplayer[3]?></td>
                    <td><?php echo $fp[3]?></td>
                    <td><?php echo $uc[3]?></td>
                    <td><?php echo $bats[3]?></td>
                    <td><?php echo $bowl[3]?></td>
                    <td><?php echo $all[3]?></td>
                    <td><?php echo $wc[3]?></td>
                    <td><?php echo $rb[3]?></td>
                </tr>

                    <tr >
                    <td><?php echo $fr[4]?></td>
                    <td><?php echo $tplayer[4]?></td>
                    <td><?php echo $fp[4]?></td>
                    <td><?php echo $uc[4]?></td>
                    <td><?php echo $bats[4]?></td>
                    <td><?php echo $bowl[4]?></td>
                    <td><?php echo $all[4]?></td>
                    <td><?php echo $wc[4]?></td>
                    <td><?php echo $rb[4]?></td>
                </tr>

                    <tr >
                    <td><?php echo $fr[5]?></td>
                    <td><?php echo $tplayer[5]?></td>
                    <td><?php echo $fp[5]?></td>
                    <td><?php echo $uc[5]?></td>
                    <td><?php echo $bats[5]?></td>
                    <td><?php echo $bowl[5]?></td>
                    <td><?php echo $all[5]?></td>
                    <td><?php echo $wc[5]?></td>
                    <td><?php echo $rb[5]?></td>
                </tr>

                    <tr >
                    <td><?php echo $fr[6]?></td>
                    <td><?php echo $tplayer[6]?></td>
                    <td><?php echo $fp[6]?></td>
                    <td><?php echo $uc[6]?></td>
                    <td><?php echo $bats[6]?></td>
                    <td><?php echo $bowl[6]?></td>
                    <td><?php echo $all[6]?></td>
                    <td><?php echo $wc[6]?></td>
                    <td><?php echo $rb[6]?></td>
                </tr>

                    <tr >
                    <td><?php echo $fr[7]?></td>
                    <td><?php echo $tplayer[7]?></td>
                    <td><?php echo $fp[7]?></td>
                    <td><?php echo $uc[7]?></td>
                    <td><?php echo $bats[7]?></td>
                    <td><?php echo $bowl[7]?></td>
                    <td><?php echo $all[7]?></td>
                    <td><?php echo $wc[7]?></td>
                    <td><?php echo $rb[7]?></td>
                </tr>
    		</tbody>
		</table>
        <div class="logo_container">
            <img src="images/DD.jpg" class="image-responsive" id="5" alt="DD" onclick="animate1(this.id);">
            <img src="images/SRH.jpg" class="image-responsive"  id="6" alt="SRH" onclick="animate1(this.id);">
            <img src="images/gl.jpg" class="image-responsive"  id="7" alt="GL" onclick="animate1(this.id);">
            <img src="images/rcb.jpg" class="image-responsive"  id="8" alt="RCB" onclick="animate1(this.id);">
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