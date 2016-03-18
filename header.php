<!DOCTYPE html>
<html>
<head>
<title>Helper Application</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/busra_js.js"></script>
<!-- Custom Theme files -->
<link href="css/styleCampaigns.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->

<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Charity Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="content_filter/css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="content_filter/css/style.css"> <!-- Resource style -->
<script src="content_filter/js/modernizr.js"></script> <!-- Modernizr -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script>
</script>
</head>
<body>
<!---->
<div> 
	<div>
		<?php if(!empty($_SESSION["user"])){ ?>Hoşgeldin <?php echo $_SESSION["user"]["name"]; ?> / <a href="index.php?page=logout"> &nbsp logout </a> <?php } else { ?>
		<a href="index.php?page=login"> <button> Giriş Yap / Kayıt Ol </button> </a> <?php } ?> </input>
	</div>
	<div class="header">
	 <div class="container">
		 <div class="header-top">
			 <div class="logo">
				 <a href="index.php"><h1>Helper <span>Yardım edebilirsin!</span></h1></a>
			 </div>
			 <div class="hdr-address">
				 <div class="address1">
					 <h5> Helper inc </h5>
					 <p>Türkiye</p>
				 </div>
				 <div class="call">
					 <h5>444 44 00</h5>
					 <p>Danışma Hattı</p>
				 </div>

				 <div class="clearfix"></div>

			 </div>
			 <div class="search">
				 <div class="search-box">
					 <div id="sb-search" class="sb-search">
						  <form>
							<input class="sb-search-input" placeholder="aranacak kelime..." type="search" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"> </span>
						 </form>
					 </div>
				 </div>
			 </div>
			 <div class="clearfix"> </div>
			 <!-- search-scripts -->
			<script src="js/classie.js"></script>
			<script src="js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
			<!-- //search-scripts -->
		 </div>
		 <div class="top-menu">
			 <span class="menu">MENU</span>
			 <ul>
			 <li class=<?php if($page=="home") echo "active"; ?> ><a href="index.php?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Ana Sayfa</a></li>
			 <li class=<?php if($page=="profile") echo "active"; ?> ><a href="index.php?page=profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Profilim</a></li>
			 <li class=<?php if($page=="about") echo "active"; ?> ><a href="index.php?page=about"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Hakkımızda</a></li>
			 <li class=<?php if($page=="gallery") echo "active"; ?> ><a href="index.php?page=gallery"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Galeri</a></li>
			 <li class=<?php if($page=="contact") echo "active"; ?> ><a href="index.php?page=contact"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>İletişim</a></li>
			 </ul>
		 </div>
		 <!-- script-for-menu -->
		 <script>					
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle("slow" , function(){
						});
					});
		 </script>
		 <!-- script-for-menu -->	
		 <div class="clearfix"></div>
	 </div>
	</div>
</div>
<!---->	  

	 </div>
</div>