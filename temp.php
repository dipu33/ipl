<?php
session_start();
?>

&nbsp;
<!DOCTYPE html>
<html>

<head>
	<title>IPL AUCTION</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="stylesheet/index_design.css">
	<link rel="stylesheet" href="stylesheet/animate.css">

</head>
<script type="text/javascript">
	var j=0;
	function animate1(idtest)
	{
		for(var i=1;i<=8;i++)
		{
			if(i!=idtest)
			{
				//change animation class for onclick event on images
				document.getElementById(i).className="animated fadeOutRight";
				fun(i);
			}
			else 
			{
				//change position of image that click by user
				document.getElementById(i).style.float="left";

				fun2();
				document.getElementById("hiddeninput").value=idtest;
				
				document.getElementById('section').style.pointerEvents ='none';
			}
		}
	}

	function fun2()
	{
		//blur all background and show popup
		document.getElementById("register").style.display="block";
		document.getElementById("header").style.opacity=".30";
		document.getElementById("footer").style.opacity=".30";
	}
	
	function fun(idss)
	{
		//create image div dynamically 
		document.getElementById("sidemenu").style.display="block";
		var imgsrs=document.getElementById(idss).src;
    	var imgs = document.createElement("img");
        document.getElementById("sidemenu").appendChild(imgs);
  		imgs.setAttribute("src", imgsrs);
		imgs.setAttribute("height", "150px");
		imgs.setAttribute("width", "150px");
		$("img").css("border-radius","50%");
	}

	var count=0;
	var temp_id;
	var source;
	$(document).on('click', 'img', function()
	{
		//count=0  for  first time click
		if(count==0)
		{
			source=this.src;
			temp_id=this.id;
			count++;
		}
		
		else if(count>0)
		{
			
			for(var l=1;l<9;l++)
			{
				//loop for change value of hiddeninput 
				var p=document.getElementById(l);
		
				if(p.src==this.src)
				{
					document.getElementById("hiddeninput").value=l;

					
				}
			}
			//for change images 
			var cc=this.src;
			this.src=source;
			var x=document.getElementById(temp_id);
			
			x.src=cc;
			source=cc;
			}
	
			 
	});

</script>

<body>
	<div id="main">
		<div id="header">
			
			<h1 align="center" style="font-size:96; color: white;"><b>IPL AUCTION 2016</b></h1>
		</div>

		<div id="section" >
			<center>
            <!-- images -->
				<img src="images/KXIP.jpg" class="image-responsive" id="1" alt="KXIP" onclick="animate1(this.id);">
				<img src="images/mi.jpg" class="image-responsive" id="2" alt="MI" onclick="animate1(this.id);">
				<img src="images/rps.jpg" class="image-responsive" id="3" alt="RPS" onclick="animate1(this.id);">
				<img src="images/kkr.jpg" class="image-responsive" id="4" alt="KKR" onclick="animate1(this.id);">
				<img src="images/DD.jpg" class="image-responsive" id="5" alt="DD" onclick="animate1(this.id);">
				<img src="images/SRH.jpg" class="image-responsive"  id="6" alt="SRH" onclick="animate1(this.id);">
				<img src="images/gl.jpg" class="image-responsive"  id="7" alt="GL" onclick="animate1(this.id);">
				<img src="images/rcb.jpg" class="image-responsive"  id="8" alt="RCB" onclick="animate1(this.id);">
			</center>
		</div>

		<div id="footer">
		</div>

		<div id="sidemenu" class="sidemenuclass">
		
            <!-- blur images horizontal -->
        </div>
	</div>

	<div id="register" class="animated FlipInX">

            <!-- login form -->
	    <div class="wrapper" >
      		<form class="form-signin" action="test.php">       
        		<h2 class="form-signin-heading">Sign In</h2>
                <input type="hidden" name="iid" id="hiddeninput">
        		<input type="text" class="form-control" name="username" placeholder="Franchise Id" required autofocus />
        		<input type="password" class="form-control" name="password" placeholder="Password" required/>      
        		<label class="checkbox">
          			<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
        		</label>
        		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
      		</form>

 		</div>
	</div>
</body>
</html>