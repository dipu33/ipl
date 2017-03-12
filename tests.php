<?php
$host="localhost";
	
$usr="root";
$pass="";
$con=mysql_connect($host,$usr,$pass);
mysql_select_db('ipl');
			
if(!isset($_SESSION))
{		
	session_start();
	$usr=$_SESSION["username"];
	//echo $usr;
	$s=$_SESSION["counter"];
	if($_SESSION["setplayer"]==0)
	{	
		//	echo "yes";
        $query_counter="select counter from tempcount";
        $rcount=  mysql_query($query_counter);
        while($rowcount=  mysql_fetch_row($rcount))
        {
            $cnt=$rowcount[0];
        }                                             
		$usr=$_SESSION["username"];
		$query_baseprice="select baseprice from players where PlayerId=$cnt";
		//			echo $query_baseprice;
		$res=mysql_query($query_baseprice); 
		while($raw=mysql_fetch_row($res))
		{	
			$current=$raw[0];
		}
		$query_budget="select Budget from teams_details where TeamName='$usr'";
		//echo $query_budget;
		$res=mysql_query($query_budget);
		while($raw=mysql_fetch_row($res))
		{
			$budget=$raw[0];
		}
		$budget=$budget-$current;
		//						echo $budget;
		//echo $st;
		if($budget>0)
		{
			$_SESSION["setplayer"]=1;
			//						echo $_SESSION["setplayer"];	
			if($current<5000000)
			{
				$next=$current+1000000;
			}
			else if($current>=5000000 && $current<10000000)
			{
				$next=$current+2500000;
			}
			else if($current>=10000000 && $current<50000000)
			{
				$next=$current+5000000;
			}	
			else
			{
				$next=$current+10000000;
			}					
			$str="Insert into bid SET teamname='$usr' , bidf=$next";
			$query_updatetime="update timer SET time='20'";
			mysql_query($query_updatetime);
			mysql_query($str);
		}
		else
		{
			//	echo "sry you have not enough budget";
		}
		$output =  array('first'=>$current,'third'=>$next);
		echo json_encode($output); 
	}					
	else
	{
        $query_updatetime="update timer SET time='20'";
		$query_budget="select Budget from teams_details where TeamName='$usr'";
		$res=mysql_query($query_budget);
		while($raw=mysql_fetch_row($res))
		{
			$budget=$raw[0];
		}	
		$query_nextbid="select bidf from bid";
		$re=mysql_query($query_nextbid);    
		while($result=mysql_fetch_row($re))
		{
			$current=$result[0];
		}
		//	echo $current;
		//echo $budget;
		//	echo $current;
		$budget=$budget-$current;								
		if($budget>=0)
		{
			mysql_query($query_updatetime);
			//							echo $budget;
			//								echo $query_updatebudget;							
			if($current<5000000)
			{
				$next=$current+1000000;
			}
			else if($current>=5000000 && $current<10000000)
			{
				$next=$current+2500000;
			}
										else if($current>=10000000 && $current<50000000)
										{
											$next=$current+5000000;
										}	
										else
										{
											$next=$current+10000000;
										}
												//echo $next;
								
											
											$str="UPDATE bid SET teamname='$usr' , bidf=$next ";
											$_SESSION["time"]=20;
				//							echo $str;
											mysql_query($str);
										
							$output =  array('first'=>$current,
            	   					'third'=>$next
                			 );
							echo json_encode($output); 
		
										}
										
										
							}
			}
	
					
						