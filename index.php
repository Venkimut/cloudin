<?php
	include 'conndb.php';
	$mas_sql = "SELECT source_id FROM backgrounds_services order BY source_id DESC limit 1";
	$mas_sql = mysqli_query($conn,$mas_sql);
	$mas_sql = $mas_sql->fetch_assoc();
	$home_bg = "select url from background_child where type='home' AND bgimg_id='{$mas_sql['source_id']}'";
	$cust_bg = "select url from background_child where type='customize' AND bgimg_id='{$mas_sql['source_id']}'";
	$home_bg = mysqli_query($conn,$home_bg);
	$cust_bg = mysqli_query($conn,$cust_bg);
	$home_bg = $home_bg->fetch_assoc();
	$cust_bg = $cust_bg->fetch_assoc();
?>
<html>
<!--
	Hello Developer....
	This site is design and develop as a task on Cloudin Technologies..
	For more details about site See on "About" tab
-->
<head>
	<title>Cloudin - Services</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
	<link rel="shortcut icon" href="http://www.cloudintechnologies.com/images/favicon.png">
	<!-- Bootstrap CSS File -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Libraries CSS Files -->
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<!-- Main Stylesheet File -->
	<link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<style type="text/css">
	    h1.intro-title.mb-4 {
	      height: 2em;
	    }
	    h1.intro-title.mb-4 img {
	    	border-radius: 170px;
			opacity: 0.9;
			height: 2em;
		}
		h1.intro-title.mb-4 figcaption {
		    font-size: 25px;
		    text-shadow: -1px 1px 2px #cb3f5f, 2px 2px 2px #6f3b79;
		    font-variant: petite-caps;
		    font-weight: 400;
		}
	    body::-webkit-scrollbar {
	      display: none;
	    }

		.button-shine {
		    width: -webkit-fill-available;
	   		margin-top: 3em;
	   	    position: relative;
		    overflow: hidden;	
		}
		.button-shine:hover .shine {
		    transform: skewX(40deg) translateX(40em);	
		}

		.custom-btn {
		    padding: 14px 4em;
		    width: -webkit-fill-available;
		    color: white;
		    font-size: 1.5em;
		    background: white;
		    font-weight: bold;
		    transition: background .6s linear;
		    letter-spacing: 2px;
		    border-radius: 10px;
		    color: black;
		    border: 2px solid gold;
		}

		.shine {
		    position: absolute;
		    top: 0;
		    left: -70px;
		    height: 98px;
		    width: 17px;
		    background: rgb(255, 222, 42);
		    box-shadow: 2px 2px 43px 7px #fbe257;
		    transition: all .6s linear;
		    transform: skewX(40deg) translateX(0em);
		}
		section#custom
		{
			height: 60vh;
			background-image: url(http://4.bp.blogspot.com/-yiDcScBd14I/VisvsvsrkyI/AAAAAAAAAX8/li92jLVzYTw/s1600/5su8sTX.jpg);
		    background-attachment: fixed;
		    background-color: #4a8babbd;
		    opacity: 0.8;
		    background-blend-mode: overlay;
		}
		section#custom .custom-head {
		    color: white;
		    text-shadow: 2px 2px 8px #44d4fc, 2px 2px 8px #fff;
		    font-variant: petite-caps;
		    padding: 2em 0em 2em 0em;
		}
		h3.custom-head::before {
		    content: "";
		    font-size: 1px;
		    padding: 0px 20px;
		    box-shadow: -7px -4px 0px 1px, -7px -9px 0px 1px;
		}
		h3.custom-head::after {
		    content: "";
		    font-size: 1px;
		    padding: 0px 18px;
		    box-shadow: 7px -4px 0px 1px, 7px -9px 0px 1px;
		}
		h4 a:hover {
			font-size: 27px;
			transition-duration: 1s;
		}
		i.material-icons {
			font-size: 55px;
		    padding: 23px;
   		}
		div.ajax_loader {
			position: fixed;
		    top: 0%;
		    background: #000000c7;
		    height: 100vh;
		    width: 100vw;
		}
		div.ajax_loader svg {
			height: 15em;
		    position: absolute;
		    top: 30%;
		}
	</style>
	<script type="text/javascript">
		function sub()
		{
			var error=0;

			$(".form-control").each(function(){
				var val = $(this).val();
				if(val == '' || val == ' ')
				{	
					error++;
					$(this).css("border","2px solid red")
				}
				else
				{
					$(this).css("border","none")
				}
			});
			if(error == 0)
			{
				$(".modal").modal('hide');
				$(".ajax_loader").show();
				var datum = $("#services").serialize();
				$.ajax({
					url: "services.php",
					type: "POST",
					data: datum,
					success: function(data)
					{
						alert("The Cutomizations are applied....");
						location.reload();						
					}
				});
			}
		}
		function load_img()
		{
			var home_bg = $("input#home_bg").val();
			var cust_bg = $("input#cust_bg").val();
			$("img#home_bg_img").attr("src",home_bg);
			$("img#cust_bg_img").attr("src",cust_bg);
		}
		function load_icon()
		{

			$(".form-control.ionicon").each(function(){
				var ion_class = $(this).val();
				$("i."+this.id).html(ion_class);
				ios_class=null;
			});
		}
	</script>
</head>
<body class="page-top">
	<!--/ Nav Start /-->
	<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
	    <div class="container-fluid">
	      <a class="navbar-brand js-scroll" href="#page-top">
	      	<img src="http://www.cloudintechnologies.com/images/cloudin-logo.png">
	      </a>
	      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
	        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
	        <span></span>
	        <span></span>
	        <span></span>
	      </button>
	      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
	        <ul class="navbar-nav">
	          <li class="nav-item">
	            <a class="nav-link js-scroll active" href="#home">Home</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link js-scroll" href="#service">Services</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link js-scroll" href="#custom">Custom</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link js-scroll" href="#footer" data-toggle="modal" data-target="#desc">About</a>
	          </li>
	        </ul>
	      </div>
	    </div>
	</nav>
	<!--/ Nav End /-->

	<!--/ Intro Section Start /-->
	<div id="home" class="intro route bg-image" style="background-image: url('<?php echo $home_bg['url'];?>');background-repeat: no-repeat;background-size: cover;">
    	<div class="overlay-itro"></div>
    	<div class="intro-content display-table">
	      <div class="table-cell">
	        <div class="container">
	          <!--<p class="display-6 color-d">custom-btn, world!</p>-->
			<h1 class="intro-title mb-4"><img src="http://www.cloudintechnologies.com/images/about/a2.jpg">
				<figcaption>Cloudin Technologies</figcaption></h1>
	          <p class="intro-subtitle" style="font-size: 2rem;"><span class="text-slider-items">
	          	Branding and Identity,Web and UI Design,Web Development,Online Marketing,Mobile App Development,E-Commerce Portal
	          </span><strong class="text-slider"></strong></p>
	          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
	        </div>
	      </div>
    	</div>
  	</div>
  	<!--/ Intro Section End /-->

  	<!--/ Services Section Start /-->
	<section id="service" class="services-mf route" style="padding-top: 5em;">
	    <div class="container">
	      	<div class="row">
	        	<div class="col-sm-12">
	          		<div class="title-box text-center">
	            		<h3 class="title-a">
	              			Services
	            		</h3>
			            <p class="subtitle-a">
			              We Offers
			            </p>
			            <div class="line-mf"></div>
	          		</div>
	        	</div>
	      	</div>
	      	<div class="row d-flex justify-content-center">
	      	<?php
				$ser_sql = "select * from service_child where service_id='".$mas_sql['source_id']."'";
				$ser_sql = mysqli_query($conn,$ser_sql);	
				if($ser_sql->num_rows > 0)
				{
					while ($row = $ser_sql->fetch_assoc()) 
					{
			?>
						<div class="col-md-4">
				          <div class="service-box">
				            <div class="service-ico">
				              <span class="ico-circle"><i class="material-icons"><?php echo $row['icon'];?></i></span>
				            </div>
				            <div class="service-content">
				              <h2 class="s-title"><?php echo $row['name'];?></h2>
				              <p class="s-description text-center">
				                <?php echo $row['description'];?>
				              </p>
				            </div>
				          </div>
				        </div>
				<?php
					}
				}
				else {
					echo "<h4 align='center'>Services is on updating</h4>";
				}
				?>
		    </div>
	    	</div>
	    </div>
	</section>
  <!--/ Section Services End /-->

  <!--/ Section Custom Start /-->
	<section id="custom" class="custom-mf route" style="background-image: url('<?php echo $cust_bg['url'];?>');background-repeat: no-repeat;background-size: cover;">
	  	<div class="container">
	  		<div class="row d-flex justify-content-center">
	  			<div class="col-md-12">
	  				<h3 align="center" class="custom-head">Customize this Site</h3>
	  			</div>
	  			<div class="col-sd-10 col-md-6">
					<div class="button-shine">
				  		<button class="custom-btn btn" data-toggle="modal" data-target="#Customize">CUSTOMIZE</button>
				  		<div class="shine"></div>
					</div>
	  			</div>
	  		</div>
	  	</div>
	</section>
  <!--/ Section Custom End /-->

	<div id="desc" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Cloudin Technologies - Services</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	  		<script type="text/javascript">
	  			console.log("%c Hello Developer","font-family: cursive;font-size: 22px;color: blue;");
	  		</script>
	      <div class="modal-body">
	        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This site is deveoped for as a task for <strong>Cloudin Technologies</strong></p>
	        <br>
	        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This site is completly dynamic site. You change the background images and you can totally change the Services tab contents. There is a last Section has a Customize button to Customize the site.</p>
	        <h3 align="center">Thankyou</h3>

	      </div>
	      <div class="modal-footer d-flex justify-content-center">
	      	<center>
	        	<small align="center">Designed and Developed by <strong><a href="http://muthuvenkatesh.co.nf/resume">Muthu Venkatesh.</a></strong></small>
	        </center>
	        <br>
	        <button type="button" class="btn btn-info" data-dismiss="modal" style="position: absolute;right: 10px;">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div id="Customize" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg" style="max-width: 93%;">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Customize</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	      <div class="modal-body">
	      		<form class="form" id="services" onsubmit="submit();">
	      			<div class="row	">
	      				<div class="col-md-12">
	      					<h3>Backgrounds...</h3>
	      				</div>
	      				<div class="col-md-6">
	      					<div class="form-group">
	      						<label for="link">Link for Homepage Background</label>
	      						<input type="url" class="form-control" id="home_bg" name="home_bg" onkeydown="load_img();" onkeyup="load_img();" onkeypress="load_img();" value="<?php echo $home_bg['url'];?>" required>
	      						<img src="" id="home_bg_img" alt="Image not found" style="height: 10em;">
	      					</div>
	      				</div>
	      				<div class="col-md-6">
	      					<div class="form-group">
	      						<label for="link">Link for Customize section Background</label>
	      						<input type="url" class="form-control" id="cust_bg" name="cust_bg" onkeydown="load_img();" onkeyup="load_img();" onkeypress="load_img();" value="<?php echo $cust_bg['url'];?>" required>
	      						<img src="" id="cust_bg_img" alt="Image not found" style="height: 10em;">
	      					</div>
	      				</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-12">
	      					<h3>Services Details...</h3>
	      				</div>
						<div class="col-md-1">
	      					<div class="form-group">
	      						<label for="link">Sno</label>
	      					</div>
	      				</div>	
						<div class="col-md-3">
	      					<div class="form-group">
	      						<label for="link">Service name</label>
	      					</div>
	      				</div>						
	      				<div class="col-md-4">
	      					<div class="form-group">
	      						<label for="link">Description</label>
	      					</div>
	      				</div>
						<div class="col-md-3">
	      					<div class="form-group">
	      						<label for="link">Icon`s Class name<br><small><a href="https://material.io/tools/icons/?icon=accessibility&style=outline">For Icons reference</a></small></label>
	      					</div>
	      				</div>	      				
	      			</div>
	<?php
		$serv_sql = "select * from service_child where service_id='{$mas_sql['source_id']}'";
		$serv_sql = mysqli_query($conn,$serv_sql);
		$i = 1;
		$ii = $serv_sql->num_rows;
		if($serv_sql->num_rows > 0)
		{		
			while($row = $serv_sql->fetch_assoc())
			{
	?>
	<div class="row" id="<?php echo "details".$i;?>">
		<div class="col-md-1">
			<div class="form-group">
				<label for="sno"><?php echo $i++;?></label>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<input type="text" class="form-control" name="service_name[]" placeholder="Service name" required value="<?php echo $row['name'];?>">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<textarea name="service_desc[]" class="form-control" placeholder="Description" required><?php echo $row['description'];?></textarea>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="text" name="service_icon[]" class="form-control ionicon" id="<?php echo "icon".$i;?>" onkeypress='load_icon();' onkeyup='load_icon();' onkeydown='load_icon();' placeholder="Icons classname" value="<?php echo $row['icon'];?>" required>
			</div>
		</div>
		<div class="col-md-1">
			<i class="material-icons <?php echo "icon".$i;?>" style="font-size: 30px;"><?php echo $row['icon'];?></i>
		</div>
	<?php
		if($i==2)
		{
	?>
		<div class="col-md-1">
			<div class="form-group">
				<input type="button" class="btn btn-info" onclick="app();" value="+">
			</div>
		</div>
	<?php
		}
		if($i-1 == $ii)
		{
	?>
		<div class='col-md-1 <?php echo "decrease".$ii;?>'>
			<div class='form-group'>
				<input type='button' class='btn btn-warning' value='-' onclick="app_remove('<?php echo $ii;?>')";>
			</div>
		</div>
	<?php		
		}
	?>
	</div>
	<?php
			}
		}
	?>
		      </div>
		      <div class="modal-footer">
		        <input type="button" class="btn btn-warning" value="Apply" onclick="sub()">
	      		</form>
		        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
		      </div>
    </div>
  	</div>
	</div>





  <div id="preloader"></div>
  
  <div class="ajax_loader">
  	<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-wedges"><g transform="translate(50,50)"><g ng-attr-transform="scale({{config.scale}})" transform="scale(0.7)"><g transform="translate(-50,-50)"><g transform="rotate(287.513 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="0.75s" begin="0s" repeatCount="indefinite"></animateTransform><path ng-attr-fill-opacity="{{config.opacity}}" ng-attr-fill="{{config.c1}}" d="M50 50L50 0A50 50 0 0 1 100 50Z" fill-opacity="0.8" fill="#4658ac"></path></g><g transform="rotate(125.635 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform><path ng-attr-fill-opacity="{{config.opacity}}" ng-attr-fill="{{config.c2}}" d="M50 50L50 0A50 50 0 0 1 100 50Z" transform="rotate(90 50 50)" fill-opacity="0.8" fill="#e7008a"></path></g><g transform="rotate(323.757 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1.5s" begin="0s" repeatCount="indefinite"></animateTransform><path ng-attr-fill-opacity="{{config.opacity}}" ng-attr-fill="{{config.c3}}" d="M50 50L50 0A50 50 0 0 1 100 50Z" transform="rotate(180 50 50)" fill-opacity="0.8" fill="#ff003a"></path></g><g transform="rotate(161.878 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="3s" begin="0s" repeatCount="indefinite"></animateTransform><path ng-attr-fill-opacity="{{config.opacity}}" ng-attr-fill="{{config.c4}}" d="M50 50L50 0A50 50 0 0 1 100 50Z" transform="rotate(270 50 50)" fill-opacity="0.8" fill="#ff6d00"></path></g></g></g></g></svg>
  </div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>


  <!-- Main Script File -->
  <script src="js/main.js"></script>
  <script type="text/javascript">
  	var count=<?php echo $i-1;?>,x;
  	function app()
  	{
  		count++;
  		var pre_count = count-1;
  		$(".decrease"+pre_count).remove();
  		$("form.form").append("<div class='row' id='details"+count+"'><div class='col-md-1'><div class='form-group'><label for='sno'>"+count+"<label></div></div><div class='col-md-3'><div class='form-group'><input type='text' class='form-control' name='service_name[]' placeholder='Service name' required></div></div><div class='col-md-4'><div class='form-group'><textarea name='service_desc[]' class='form-control' placeholder='Description' required></textarea></div></div><div class='col-md-2'><div class='form-group'><input type='text' name='service_icon[]' id='icon"+count+"' class='form-control ionicon' onkeypress='load_icon();' onkeyup='load_icon();' onkeydown='load_icon();' placeholder='Icons classname' required></div></div><div class='col-md-1'><i class='material-icons icon"+count+"' style='font-size: 30px;'></i></div><div class='col-md-1 decrease"+count+"'><div class='form-group'><input type='button' class='btn btn-warning' value='-' onclick=app_remove('"+count+"');></div></div></div>");
  	}
  	function app_remove(x)
  	{
		var pre_count = x-1;
  		$("#details"+x).remove();
   		if(x != 2)
  		{
  			$("#details"+pre_count).append("<div class='col-md-1 decrease"+pre_count+"'><div class='form-group'><input type='button' class='btn btn-warning' value='-' onclick=app_remove('"+pre_count+"');></div></div>");
  		}
  		count = count-1;

  	}
  	$(".ajax_loader").css("display","none");	
  	load_img();
  </script>
</body>
</html> 