<html>

<head>
<title>Helo World</title>
</head>
<body>
<?php
	$count=0;
	// connection variable
	$host="localhost";
	$usr="root";
	$pass="";
	$con=mysql_connect($host,$usr,$pass);
	mysql_select_db('ipl');
	//fetch username and password from temp.php --> register popup
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	//get id of a image from hiddeninput field from temp.php --> register popup
	$testid=$_REQUEST['iid'];

 //query for select teamname according to selected team id
	echo $testid;

 	$str_tcode="select TeamName from teams1 where TeamCode='$testid';";
	echo $str_tcode;
	$temp_tcode=mysql_query("$str_tcode");
		while($r=mysql_fetch_row($temp_tcode))
		{
			$t=$r;
			echo $t[0];
		}
	// authenticate user 
	$str="select *from owners where TeamName='$t[0]' AND password='$password' ";
	$query_update="update owners SET Online=1 where TeamName='$t[0]'";

		$result=mysql_query($str);
	while($raw=mysql_fetch_row($result))
	{
	//	echo "yes";
		$count++;

	}
		echo $count;
		if($count==1)
		{
			echo "login success";
				mysql_query($query_update);
			echo $query_update;
			session_start();
			$_SESSION["TeamName"]=$t[0];
			$_SESSION["TeamCode"]=$testid;
			$_SESSION["username"]=$username;
					echo "<script>
alert('.....Login Success....');
window.location.href='bid.php';
</script>";	
		}
			else{
echo "dipak";
				//header('Location: temp.php');
			echo "<script>
alert('.....Login fail try again....');
window.location.href='temp.php';
</script>";	
			}
?>

</body>
</html>