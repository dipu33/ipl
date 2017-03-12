<?php
		$host="localhost";
	
$usr="root";
$pass="";
$con=mysql_connect($host,$usr,$pass);
mysql_select_db('ipl');
$query_ready="select TeamName from owners where Online=1";
$result=mysql_query($query_ready);
$count_user=0;
while($raw=mysql_fetch_row($result))
{
	$count_user++;
}
//echo $count_user;
if(!isset($_SESSION) && $count_user==8)
	{
		$temptimer;
		$Nationality;
		$baseprice;
		$capped;
		$type;
		$budget;
		
		session_start();
			//echo $_SESSION["time"];
                
					$query_count="select *from tempcount";
					$result=mysql_query($query_count);
					while($raw=mysql_fetch_row($result))
					{
						$counter=$raw[0];
					}
					
						$tempcount=$counter;
						$_SESSION["counter"]=$counter;
						$teamname=$_SESSION["TeamName"];
		//echo $_SESSION["counter"];
		$query_timer="select * from timer";
		//echo $query_timer;
		$r=mysql_query($query_timer);
		while($raw=mysql_fetch_row($r))
		{
			$timer=$raw[0];
		}

		//echo $timer;
					$stringbuy='';

				$temp_bid='';
				$temp_usr='';
		if($timer>0 && $timer<=20)
			{
				$temptimer=$timer;
				$query_usr="select * from bid";
				$res=mysql_query($query_usr);
				while($raw=mysql_fetch_row($res))
				{
					$temp_usr=$raw[0];
					$temp_bid=$raw[1];
				}
				$timer--;
				$query_updatetime="update timer SET time=$timer";
				if($_SESSION["TeamName"]=="Mumbai Indians")
				{
				mysql_query($query_updatetime);
				}
						$tempcount=$counter;
						$query_budget="select Budget from teams_details where TeamName='$teamname'";
						$bresult=mysql_query($query_budget);
						while($raw3=mysql_fetch_row($bresult))
						{
							$budget=$raw3[0];
						}

			}
			

				else if($timer==0)
				{
						$counter++;

					//	echo $counter;
							$query_updatecount="update tempcount SET counter=$counter";
					//echo $query_updatecount;
									mysql_query($query_updatetime);
					if($_SESSION["TeamName"]=="Mumbai Indians")
					{
						mysql_query($query_updatecount);
					}

                                                 	$temptimer=$timer;
                                                $_SESSION["setplayer"]=0;
                                                  $query_budget="select *from bid";
                                                    $res5=  mysql_query($query_budget);
                                                    while($raw5=mysql_fetch_row($res5))
                                                    {
                                                        $team=$raw5[0];
                                                        $bud=$raw5[1];
                                                    }
                                                    echo $_SESSION["TeamName"];
                                                    //echo $team;
                                                        if($_SESSION["TeamName"]==$team)
                                                        {
                                                            $query="select Budget from teams_details where TeamName='$team'";
                                                          // echo $query;
                                                            $r1=  mysql_query($query);
                                                            while($row=  mysql_fetch_row($r1))
                                                            {
                                                                $temp_bud=$row[0];
                                                            }
                                                            $bud=$temp_bud-$bud;
                                                          
							$query_updatebudget="update teams_details SET Budget=$bud where TeamName='$team'";
                                //                        echo $query_updatebudget;
							//echo $query_updatebudget;
							mysql_query($query_updatebudget);
                                                        }
                                                        
						
						$timer=31;          
					$query_updatetime="update timer SET time=$timer";
				
				
					$query_updatetime="update timer SET time=$timer";
					$query_soldplayer="select * from bid";
					$r=mysql_query($query_soldplayer);
				
					$teamname='';
					$price='';
					while($raw=mysql_fetch_row($r))
					{
						$teamname=$raw[0];
						$price=$raw[1];
					}
					if($teamname=='' && $price=='')
					{
						$stringbuy="this player is remain unsold";
					}
						else{
						$stringbuy="this player is bought by $teamname at $price";
						}
							$query_psold="update players SET soldto='$teamname' where playerid=$tempcount";
				//		echo $query_psold;
						mysql_query($query_psold);	
					//echo $query_updatetime;
						if($_SESSION["TeamName"]=="Mumbai Indians")
 						{	
							mysql_query($query_updatetime);
 						}
 						 			 
 						$query_temp="select TeamId from teams1 where TeamName='$teamname'";
 						echo $query_temp;
 						$tempres=mysql_query($query_temp);
 						while($row=mysql_fetch_row($tempres))
 						{
 							$tid=$row[0];
 						}

						$str="select PlayerId,PlayerName  from players where PlayerId=$tempcount";
					echo $str;
					$res=mysql_query($str); 
					while($raw=mysql_fetch_row($res))
					{	

						$pid=$raw[0];
							$pname=$raw[1];
				
					}
						$query_pinsert="insert into $tid (PlayerId,PlayerName,Baseprice) VALUES($tempcount,'$pname',$price)";
						echo $query_pinsert;
						mysql_query($query_pinsert);
						$query_fetch="select PlayerId from $tid";
						$temp=mysql_query($query_fetch);
						$cnt_tplayers=0;
						$cnt_fplayers=0;
						$cnt_uncapped=0;
						$cnt_capped=0;
						$cnt_batsman=0;
						$cnt_bowler=0;
						$cnt_wc=0;
						$cnt_alr=0;
						$fr=0;
						while($row3=mysql_fetch_row($temp))
						{
							$cnt_tplayers++;
							$id=$row3[0];
							$query_type="select Batsman,Bowler,Keeper,AllRounder,Capped,Nationality from players where PlayerId=$id";
//							echo $query_type;
							$row2=mysql_query($query_type);
							while($res=mysql_fetch_row($row2))
							{
								$b=$res[0];
								$bwl=$res[1];
								$kpe=$res[2];
								$allr=$res[3];
								$cap=$res[4];		
								$nation=$res[5];
							}
															echo $b;
															echo $bwl;
															echo $kpe;

								if($b==1)
									{
										$cnt_batsman++;
									}
									else if($bwl==1)
									{
											$cnt_bowler++;
									}
										else if($kpe==1)
										{
											$cnt_wc++;
										}
											else if($allr==1)
											{
												$cnt_alr++;
											}
												else if($cap==1)
												{
													$cnt_capped++;
												}
													else if($cap==0)
													{
														$cnt_uncapped++;
													}
														else if($nation!="Indian")
														{
															$fr++;
														}
							}
							
								$query_updatetable="update teams_details SET TotalPlayer=$cnt_tplayers,ForeignPlayer=$fr, Batsman=$cnt_batsman,Bowler=$cnt_bowler,AllRounder=$cnt_alr,WicketKeeper=$cnt_wc,Uncapped=$cnt_uncapped
								 where TeamName='$teamname' ";
								echo $query_updatetable;
								mysql_query($query_updatetable);																																
						$query_budget="select Budget from teams_details where TeamName='$teamname'";
						$bresult=mysql_query($query_budget);
						while($raw3=mysql_fetch_row($bresult))
						{
							$budget=$raw3[0];
						}


				}
						//	$s=$_SESSION["counter"];
		$str="select 	PImage,PlayerName,Nationality,Hand,Capped,BasePrice  from players where PlayerId=$tempcount";
				//echo $str;
					$res=mysql_query($str); 
					while($raw=mysql_fetch_row($res))
					{	

						$pimage=$raw[0];
							$pname=$raw[1];
							$Nationality=$raw[2];
							$type=$raw[3];
							$capped=$raw[4];
							$baseprice=$raw[5];
				
					}
								$query_seltype="select Batsman,Bowler,Keeper,AllRounder from players where PlayerId=$tempcount";
								//echo $query_seltype;
								$res2=mysql_query($query_seltype);
							while($raw2=mysql_fetch_row($res2))
							{
								$batsman=$raw2[0];
								$bowler=$raw2[1];
								$Keeper=$raw2[2];
								$AllRounder=$raw2[3];

							}
								if($batsman==1)
								{
									$ptype="$type handed batsman";
								}
								else if($bowler==1)
								{
									$ptype="$type handed bowler";
								}
									else if($Keeper==1)
									{
										$ptype="Keeper";
									}
										else{
											$ptype="$type handed AllRounder";
										}
					if($timer>20)
					{
                                            					$_SESSION["setplayer"]=0;

                                            					$query_drop="DELETE FROM bid ";

                                            								mysql_query($query_drop);	

							$timer--;
						$query_updatetime="update timer SET time=$timer";
						if($_SESSION["TeamName"] === "Mumbai Indians")
						{
						mysql_query($query_updatetime);
						}	
						
                            $query_budget="select Budget from teams_details where TeamName='$teamname'";
                            						$bresult=mysql_query($query_budget);
						while($raw3=mysql_fetch_row($bresult))
						{
							$budget=$raw3[0];

						}
					$output =  array('first'=>'',
                 'second'=>'',
				 'third'=>'',
				 'fourth'=>'',
				 'fifth'=>$stringbuy,
                   'sixth'=>'',
                 'seven'=>'',
				 'eight'=>'',
				 'nine'=>'',
				 'ten'=>'',
                                            
				 'eleven'=>$budget,


				 );
					echo json_encode($output); 
				
					}
                                          
                                                 
                                            if($capped==1)
						{
							$str_capped="capped";
						}
							else{
								$str_capped="uncapped";
							}                                       
			if($timer>0 && $timer<=20)
				{
			     $output =  array('first'=>$timer,
                 'second'=>'<img src="data:image/jpeg;base64,'.base64_encode($pimage).'"/>',
				 'third'=>$temp_usr,
				 'fourth'=>$temp_bid,
				 'fifth'=>$stringbuy,
				 'sixth'=>$pname,
				 'seven'=>$Nationality,
				 'eight'=>$ptype,
				 'nine'=>$str_capped,
				 'ten'=>$baseprice,
                                 
				 'eleven'=>$budget,
				 

                 );
				// echo $output['first'];
				 
					echo json_encode($output); 

			}
	}
			 if($timer==0)
			{
					$output =  array('first'=>'',
                 'second'=>'',
				 'third'=>'',
				 'fourth'=>'',
				 'fifth'=>$stringbuy,
                 'sixth'=>'',
                 'seven'=>'',
				 'eight'=>'',
				 'nine'=>'',
				 'ten'=>'',

				 'eleven'=>$budget,


				 );
					echo json_encode($output); 
			
	
	
			}	
?>